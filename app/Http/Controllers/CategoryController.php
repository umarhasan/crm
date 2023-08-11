<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    
    public function index(){
        $category = Category::all();
        return view('category.showCategory',compact('category'));
    }


    public function show(){
        return view('addCategory');
    }





    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.categoryedit',compact('category'));
    }



    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
       // dd($category);
        $category->save();
        session::flash('success','Record Updated Successfully');
        return redirect('category');
    }




    public function create(Request $request)
    {
        return view('category.addCategory');
    }
    
    public function store(Request $request)
    {

        request()->validate([
            'category_name' => 'required|min:3',
        ]);

        $category = Category::create( $request->all());
        if($category){
            session::flash('success','Category has been successfully added');
            return redirect('category');
        }
        // return back()->with('success','Category successfully added');
    }


    public function destroy($id)
    {
       $category = Category::find($id);
       $category->delete();
       session::flash('success','Record has been deleted Successfully');
       return redirect('category');
        
    }
}
