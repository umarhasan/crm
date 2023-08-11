<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use DB;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Orderitem;

class CheckoutController extends Controller
{

    public $gateway;
    public $completePaymentUrl;

    public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe\PaymentIntents');
        $this->gateway->setApiKey(env('STRIPE_SECRET_KEY'));
        $this->completePaymentUrl = url('confirm');
    }

    public function addwishlist(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if (!$product) 
        {
            abort(404);
        }
        
        $user = session()->get('userid');
        if ($user == null) {
            if (auth()->user()) {
                $userid = auth()->user()->id;
            } else {
                $userid = rand();
            }
            session()->put('userid', $userid);
        } else {
            $userid = $user;
        }

        $wishlist = Wishlist::where(['product_id' => $id, 'user_id' => $userid])->first();
        if ($wishlist != null) {
            return response()->json(['success'=> 'Product added to wishlist successfully!']);
        } 
        else 
        {
            Wishlist::create([
                'user_id' => $userid,
                'product_id' => $id,
            ]);
            
            return response()->json(['success'=> 'Product added to wishlist successfully!']);
        }
    }

    public function ajaxcart()
    {
        $userid = session()->get('userid');
        $data['total'] =  Cart::where(['user_id'=>$userid])->sum('total');
        $data['carts'] =  Cart::where(['user_id'=>$userid])->count();
        return $data ;
    }
    public function cart()
    {
        
        $userid = session()->get('userid');
        $data['cart'] =  Cart::where(['user_id'=>$userid])->get();
        $data['total'] =  Cart::where(['user_id'=>$userid])->sum('total');
        return view('cart',$data);
    }
    
    public function updatecart(Request $request)
    {
        // return $request->type ;
        if ($request->id and $request->quant) {
            $userid = session()->get('userid');
            
            $cart = Cart::where(['id' => $request->id, 'product_id' => $request->product_id, 'user_id' => $userid])->first();
            if ($cart) {
                if($request->type == 'plus')
                {
                    $cart->quantity = $request->quant;
                    $cart->total = $cart->product_price * $cart->quantity;
                    $cart->save(); 
                }else{
                    $quant =  $request->quant;
                    $cart->quantity = $quant;
                    $cart->total = $cart->product_price * $cart->quantity;
                    $cart->save();
                }
                
                return response()->json(['success'=> 'Cart updated successfully']);
            } else {
                return response()->json(['error'=> 'Something Went Wrong']);
            }
        }
    }
    
    public function deletecart(Request $request)
    {
        Cart::find($request->id)->delete();
        return response()->json(['success'=> 'Product Remove From Cart Successfully']);
    }
    
    public function checkout(Request $request)
    {
        $userid = session()->get('userid');
        $data['cart'] =  Cart::where(['user_id'=>$userid])->get();
        $data['countries'] =  DB::table('country')->get();
        $data['states'] =  DB::table('state')->get();
        $data['cities'] =  DB::table('city')->get();
        $data['total'] =  Cart::where(['user_id'=>$userid])->sum('total');
        return view('checkout',$data);
    }
    
    public function post_checkout(Request $request)
    {
        $userid = session()->get('userid');
        if($request->input('stripeToken'))
        {
            $carts = Cart::where(['user_id'=>$userid])->get();
            $amount = Cart::where(['user_id'=>$userid])->sum('total');            
            
            $token = $request->input('stripeToken');
 
            $response = $this->gateway->authorize([
                'amount' => $amount,
                'currency' => env('STRIPE_CURRENCY'),
                'description' => 'This is a X purchase transaction.',
                'token' => $token,
                'returnUrl' => $this->completePaymentUrl,
                'confirm' => true,
            ])->send();
 
            if($response->isSuccessful())
            {
                $response = $this->gateway->capture([
                    'amount' => $amount,
                    'currency' => env('STRIPE_CURRENCY'),
                    'paymentIntentReference' => $response->getPaymentIntentReference(),
                ])->send();
 
                $arr_payment_data = $response->getData();
 
                $this->store_payment([
                    'payment_id' => $arr_payment_data['id'],
                    'payer_email' => $request->input('email'),
                    'amount' => $arr_payment_data['amount']/100,
                    'currency' => env('STRIPE_CURRENCY'),
                    'payment_status' => $arr_payment_data['status'],
                ]);

                $latestOrder = Order::orderBy('created_at','DESC')->first();
                
                $order_id = Order::create([
                    'payment_id' => $arr_payment_data['id'],
                    'user_id' => $userid,
                    'order_no' => '#'. str_pad(4 + 1, 8, "0", STR_PAD_LEFT),
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zipcode' => $request->zipcode,
                    'status' => 'Process',
                ]);
                
                
                foreach($carts as $cart)
                {
                    OrderItem::create([
                        'order_id' => $order_id->id, 
                        'product_id' => $cart->product_id, 
                        'quantity' => $cart->quantity, 
                        'amount' => $cart->total, 
                    ]);   
                    Cart::find($cart->id)->delete();
                }
 
                return redirect("/")->with("success", "Payment is successful. Your payment id is: ". $arr_payment_data['id']);
            }
            elseif($response->isRedirect())
            {
                session(['payer_email' => $request->input('email')]);
                $response->redirect();
            }
            else
            {
                return redirect()->back()->with("error", $response->getMessage());
            }
        }
    }

    public function confirm(Request $request)
    {
        $response = $this->gateway->confirm([
            'paymentIntentReference' => $request->input('payment_intent'),
            'returnUrl' => $this->completePaymentUrl,
        ])->send();
         
        if($response->isSuccessful())
        {
            $response = $this->gateway->capture([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'paymentIntentReference' => $request->input('payment_intent'),
            ])->send();
 
            $arr_payment_data = $response->getData();
 
            $this->store_payment([
                'payment_id' => $arr_payment_data['id'],
                'payer_email' => session('payer_email'),
                'amount' => $arr_payment_data['amount']/100,
                'currency' => env('STRIPE_CURRENCY'),
                'payment_status' => $arr_payment_data['status'],
            ]);
 
            return redirect("/")->with("success", "Payment is successful. Your payment id is: ". $arr_payment_data['id']);
        }
        else
        {
            return redirect()->back()->with("error", $response->getMessage());
        }
    }
 
    public function store_payment($arr_data = [])
    {
        $isPaymentExist = Payment::where('payment_id', $arr_data['payment_id'])->first();  
  
        if(!$isPaymentExist)
        {
            $payment = new Payment;
            $payment->payment_id = $arr_data['payment_id'];
            $payment->order_id = $arr_data['payment_status'];
            $payment->payer_email = $arr_data['payer_email'];
            $payment->amount = $arr_data['amount'];
            $payment->currency = env('STRIPE_CURRENCY');
            $payment->payment_status = $arr_data['payment_status'];
            $payment->save();
        }
    }
}
