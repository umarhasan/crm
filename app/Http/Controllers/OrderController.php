<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use Spatie\Permission\Models\Role;
class OrderController extends Controller
{
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
        return view('orders.index');
    }
}
