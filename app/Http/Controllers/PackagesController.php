<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packages;
use Session;

class PackagesController extends Controller
{
    public function index()
    {

        $Packages = Packages::all();

        return view('package.showPackages',compact('Packages'));
    }

   
    public function create()
    {
        return view('package.addpackage');
    }
    
    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request,[
            'title'=> 'required',
            'price'=> 'required',
        ]);
            
            $saveResult = Packages::create([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description
            ]);
            session::flash('success','Record Uploaded Successfully');
            return redirect('packages')->with('success','Record Uploaded Successfully');
    }

   
    public function show($id)
    {

    }

   
    public function edit($id)
    {
        $package = Packages::find($id);
        //dd($package);
        return view('package.packageEdit')->with('package', $package);
    }

   
    public function update(Request $request, $id)
    {
        $product = Packages::find($id);
        $updateProduct = Packages::where('id', '=', $id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description
        ]);
        
        if($updateProduct){
            return back()
                ->with('success','Record Updated Successfully');
            }else{
            return back()
                ->with('error','Record is not Updated');         	
            }
    }

   
    public function destroy($id)
    {
        $package = Packages::find($id);
        $package->delete();
        session::flash('success','Record has been deleted Successfully');
        return redirect('packages');
    }
}
