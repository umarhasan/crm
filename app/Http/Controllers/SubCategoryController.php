<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Session;
class SubCategoryController extends Controller
{
    public function index(){
        $category = SubCategory::all();
        return view('subcategory.showCategory',compact('category'));
    }


    public function show(){
        return view('addCategory');
    }





    public function edit($id)
    {
        $data['category'] = SubCategory::find($id);
        $data['categorys'] = Category::all();
        return view('subcategory.categoryedit',$data);
    }
    
    
    
    public function subcatories($id)
    {
        $data = SubCategory::where('category_id',$id)->get();
        return response()->json(['success'=>$data]);
    }
    public function update(Request $request, $id)
    {
        $category = SubCategory::find($id);
        $category->category_name = $request->input('category_name');
        $category->category_id = $request->input('category_id');
       // dd($category);
        $category->save();
        session::flash('success','Record Updated Successfully');
        return redirect('subcategory');
    }




    public function create(Request $request)
    {
        $data['category'] = Category::all();
        return view('subcategory.addCategory',$data);
    }
    
    public function store(Request $request)
    {

        request()->validate([
            'category_id' => 'required',
            'category_name' => 'required|min:3',
        ]);

        $category = SubCategory::create( $request->all());
        if($category){
            session::flash('success','Category has been successfully added');
            return redirect('subcategory');
        }
        // return back()->with('success','Category successfully added');
    }


    public function destroy($id)
    {
       $category = SubCategory::find($id);
       $category->delete();
       session::flash('success','Record has been deleted Successfully');
       return redirect('subcategory');
        
    }
}
