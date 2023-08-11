<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        if(Auth::check())
        {
            $user = Auth::logout();
            return redirect()->to('/login')->with('success', 'User Logout successfully.');
        }else{
            return redirect()->to('/login')->with('error', 'User Logout successfully.');
        }
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required',
            // new rules here
        ]);
    }

    public function login(Request $request)
    {
        // print_r('asd');die;
        $rules = array(
            'email' => 'required|email|exists:users', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8');
            // password has to be greater than 3 characters and can only be alphanumeric and);
            // checking all field
        $validator = \Validator::make($request->all() , $rules);

        if ($validator->fails())
        {
            return redirect()->to('login')->withErrors($validator); // send back all errors to the login form
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with(['success'=>'You have Successfully loggedin']);
        }
        return redirect()->back()->with(['password' => 'Paswword Incorrect']);
        // return redirect("loginn")->with('Oppes! You have entered invalid credentials');
    }

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
}
