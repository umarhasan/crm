<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\PageCategory;
use Carbon\Carbon;
class PageController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:pages-list|pages-create|pages-edit|pages-delete', ['only' => ['index','store']]);
        $this->middleware('permission:pages-create', ['only' => ['create','store']]);
        $this->middleware('permission:pages-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pages-delete', ['only' => ['destroy']]);
        $this->middleware('permission:pages-show', ['only' => ['show']]);

    }
    public function index()
    {
        $data['pages'] = PageCategory::get(); 
        return view('homepage',$data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'page_name'=>'required|string'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with(['error'=>$validator->errors()]);
        }
        $page = new PageCategory();
        $page->page_name = $request->page_name;
        $page->created_at = Carbon::now();
        $page->save();
        return redirect()->back()->with(['success'=>'Record Add Successfully']);

    }
    public function update(Request $request,$id)
    {
        $page = PageCategory::find($id);
        $page->page_name = $request->page_name;
        $page->updated_at = Carbon::now();
        $page->save();
        return redirect()->back()->with(['success'=>'Record Updated Successfully']);

    }
    public function destroy($id)
    {
        $page = PageCategory::find($id)->delete();
        return redirect()->back()->with(['success'=>'Record Deleted Successfully']);

    }
}
