<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use File;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $data = GeneralSetting::first();
        return view('general-setting.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        //dd($request);
        $data = GeneralSetting::first();
        $logo = ($data) ? $data->logo : null;
        $this->validate($request,[
            'title'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'copyright'=> 'required',
            'facebook'=> 'required',
            'twitter'=> 'required',
            'instagram'=> 'required',
            'youtube'=> 'required',
        ]);

        if($request->hasFile('logo')) 
        {
            if($data){
                if(File::exists(public_path('/uploads/logo/'.$data->logo)))
            	File::delete(public_path('/uploads/logo/'.$data->logo));
            }

            $file = $request->file('logo');
            $logo = 'file-'.time().'.'.$file->extension();
            
            $path = public_path().'/uploads/logo/';
            $file->move($path, $logo);
        }
        if($data)
        {
            $data->update([
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'copyright' => $request->copyright,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'logo' => $logo,
            ]);
        }
        else
        {
            GeneralSetting::create([
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'copyright' => $request->copyright,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'youtube' => $request->youtube,
                'logo' => $logo,
            ]);
        }
        return redirect()->back()->with('success','Record Uploaded Successfully');
    }

   
}
