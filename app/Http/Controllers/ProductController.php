<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\VeriantSize;
use App\Models\VeriantColor;
use App\Models\User;

use Carbon\Carbon;
use File;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Session;
use Image;
use Auth;
use Validator;

class ProductController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-list', ['only' => ['index']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
          $this->middleware('permission:product-status', ['only' => ['status']]);
         
    }
    
    public function index()
	{
        $userid =  Auth::user()->roles['0']->pivot->role_id;
        $role = Role::find($userid)->name;
        // return Product::join("role_has_permissions","role_has_permissions.role_id","=",$userid)->get();
		if($role != 'Admin')
        {   
            $products = Product::where('user_id',Auth::user()->id)->get();
        }
        else
        {
            $products = Product::get();
        }

	    return view('product.index')->with('products',$products);
	}

    public function create(Request $request){
        $categories = Category::get();
        $subcat = SubCategory::get();
        $vendors = User::get();
        return view('product.create')->with('subcat',$subcat)->with('categories',$categories)->with('vendors',$vendors);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'product_name' => 'required',
            'regular_price' => 'required',
            'category_id' =>'required',
            'subcat_id' =>'required',
            'stock'         =>'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $vendor_id =  Category::where('id',$request->category_id)->first();
        $product = new Product();
        $product->user_id = Auth::id();
        $product->product_name = $request->product_name;

        $product->product_slug= Str::slug($request->product_name);

        $product->regular_price = $request->regular_price;
        $product->pr_item_price = $request->pr_item_price;
        $product->sale_price = $request->regular_price;
        $product->stock = $request->stock;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->category_id =$request->category_id;
        $product->subcat_id = $request->subcat_id;
        $product->has_size = $request->size;
        $product->has_color = $request->color;
        

        // return $request->all();

        if($request->file('product_image'))
        {
            $image = $request->file('product_image');
            $input['imagename'] = Carbon::now()->timestamp.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/product');
            $img = Image::make($image->getRealPath());
            $img->resize(460, 480, function ($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            $product->product_image = $input['imagename'];
        }
        $product->save();

        $product_id = $product->id;
        // $product_id = 1;
        if(isset($request->size))
        {
            
            $size = $request->size_name;
            $quantity = $request->size_quantity;
            $price = $request->size_price;
            $count =0;
            
            foreach($size as $code) {
                echo $code; 
                echo $quantity[$count];
                echo $price[$count];
                VeriantSize::create([
                    'name' => $code,
                    'quantity' => $quantity[$count],
                    'price' => $price[$count],
                    'product_id' => $product_id,
                ]);
                
                $count++;
            }

        }
        if(isset($request->color))
        {


            $colors = $request->color_name;
            $cquantity = $request->color_quantity;
            $cprice = $request->color_price;
            $count2 =0;
            
            foreach($colors as $color) {
                VeriantColor::create([
                    'name' => $color,
                    'quantity' => $cquantity[$count2],
                    'price' => $cprice[$count2],
                    'product_id' => $product_id,
                ]);
                
                $count2++;
            }

        }

        $request->session()->flash('SUCCESSS' , 'Product inserted!');

        return redirect('product');

    }

    public function edit($id)
    {
        
        $data['product'] = Product::find($id);
        $data['categories'] = Category::get();
        $data['subcat'] = SubCategory::get();
        $data['vendors'] = User::get();
        return view('product.edit',$data);
    }


    public function update(Request $request, $id)
	{
	   
		$request->validate([
            'product_name' => 'required',
            'regular_price' => 'required',
            'category_id' =>'required',
            'subcat_id' =>'required',
            'stock'     =>'required',
        ]);

		$product = Product::find($id);
		$product->user_id=Auth::id();
        $product->product_name = $request->product_name;

        $product->product_slug= Str::slug($request->product_name);

        $product->regular_price = $request->regular_price;
        $product->pr_item_price = $request->pr_item_price;
        $product->sale_price = $request->regular_price;
        $product->stock = $request->stock;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->category_id =$request->category_id;
        $product->subcat_id = $request->subcat_id;
        $product->has_size = $request->size;
        $product->has_color = $request->color;

        if($request->file('product_image'))
        {
            if(File::exists(public_path('/uploads/product/'.$product->product_image)))
            	File::delete(public_path('/uploads/product/'.$product->product_image));

            $image = $request->file('product_image');
            $input['imagename'] = Carbon::now()->timestamp.'.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/product');
            $img = Image::make($image->getRealPath());
            $img->resize(460, 480, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            $product->product_image=$input['imagename'];
		}

		$product->save();

        if(isset($request->size))
        {  
            VeriantSize::where('product_id',$id)->delete();
            $size = $request->size_name;
            $quantity = $request->size_quantity;
            $price = $request->size_price;
            
            for($count=0; $count<count($size); $count++) 
            {
                VeriantSize::create([
                    'name' => $size[$count],
                    'quantity' => $quantity[$count],
                    'price' => $price[$count],
                    'product_id' => $id,
                ]);        
            }

        }
        
        if(isset($request->color))
        {
            VeriantColor::where('product_id',$id)->delete();
            $colors = $request->color_name;
            $cquantity = $request->color_quantity;
            $cprice = $request->color_price;
            
            for($count2=0; $count2<count($colors); $count2++)
            {
                VeriantColor::create([
                    'name' => $colors[$count2],
                    'quantity' => $cquantity[$count2],
                    'price' => $cprice[$count2],
                    'product_id' => $id,
                ]);   
            }
        }


        return redirect('product')->with('SUCCESS', 'Product updated!');

	}

    public function images($id)
	{
		$product=Product::find($id);
        // return ProductImage::where('product_id',$id)->get();
        // dd($product);
		return view('product.images')->with('product',$product);
	}


    public function postImages(Request $request, $id)
	{
        // return  $id;
		$request->validate([
          'images' => 'required',
          'images.*' => 'mimes:jpeg,jpg,png,gif'
        ]);

		$images=array();

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            foreach($images as $key => $image) {
			    $name = Carbon::now()->timestamp.$image->getClientOriginalName();

                //$destinationPath = public_path('/uploads/product/gallery',$name);
                $image->move(public_path("/uploads/product/gallery"), $name);


                ////////////////////////
                // $img = Image::make($image->getRealPath());
                // $img->resize(460, 480, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$name);


                $prImg = new ProductImage();
                $prImg->product_id = $id;
                $prImg->product_image = $name;
                $prImg->save();
			}
		}

		return back()->with('success', 'Images uploaded successfully');
	}


    public function imgDelete(Request $request, $img_id){
        $pr_img = ProductImage::find($img_id);
        if(FIle::exists(public_path('/uploads/product/gallery/'.$pr_img->product_image)))
            File::delete(public_path('/uploads/product/gallery'.$pr_img->product));
        $pr_img->delete();

        $request->session()->flash('SUCCESS' , 'Image Delete Successfully');
        return back();

    }

    public function status(Request $request, $id){
        $product = Product::find($id);
        $product->status = $request->status;
        $product->save();

        return $product->product_name;
    }
    public function destroy($id){
        $product = Product::find($id);
        $pr_img = ProductImage::where('product_id',$id)->get();
        
        foreach($pr_img as $img){
            File::delete(public_path('/uploads/product/gallery/'.$img->product_image));
        }
        
        if(File::exists(public_path('/uploads/product/'.$product->product_image)))
        File::delete(public_path('/uploads/product/'.$product->product_image));
        $product = Product::find($id)->delete();
      
        return back()->with('success' , 'Product Delete Successfully');

    }
    
    public function vendorProduct($id)
    {
        // return $id;
        $products = Product::where('vendor_id',$id)->get();
	    return view('product.vendor-product')->with('products',$products);
        
        // products
    }
    
}
