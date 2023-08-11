<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VeriantSize;
use App\Models\PageCategory;
use App\Models\PageSections;
use App\Models\VeriantColor;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {

        

        // $files = Storage::disk('views')->files('');
        // echo "<pre>";
        // print_r($files);die;
        $page = PageCategory::where('page_name','Home')->first();
        $data['slider'] = PageSections::where('section_name','slider')->first();
        $data['middel'] = PageSections::where('section_name','middel')->get();
        $data['video'] = PageSections::where('section_name','video')->get();
        
        $data['products'] = Product::limit(8)->get();
        $data['productasc'] = Product::OrderBy('id','Asc')->first();
        $data['productdsc'] = Product::OrderBy('id','Desc')->first();
        return view('index',$data);
    }
    
    public function product_detail($id)
    {
        $data['product'] = Product::find($id);
        $data['size'] = VeriantSize::where('product_id',$id)->first();
        // return json_decode($size->name); 
        $data['color'] = VeriantColor::where('product_id',$id)->first();
        return view('product_detail',$data);
    }
}
