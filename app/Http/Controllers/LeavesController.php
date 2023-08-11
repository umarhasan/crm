<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leaves;
use Auth;
use File;


class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('all-users-leave-list')) {
            $data['leaves'] = leaves::all();
        }
        else
        {   
            $data['leaves'] = Leaves::where('user_id',Auth::user()->id)->get();
        }
        return view('leaves.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $this->validate(request(), [
                'leave_type' => 'required',
                'duration' => 'required',
                'reason' => 'required',
            ]);

            $fileName = null;
            if (request()->hasFile('document_img')) 
            {
                $file = request()->file('document_img');
                $path = public_path('/uploads/leaves/');
                $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
                $file->move($path, $fileName);
            }

            Leaves::create([
                'user_id' => Auth::user()->id,
                'leave_type' => request()->get('leave_type'),
                'duration' => request()->get('duration'),
                'reason' => request()->get('reason'),
                'document_img' => $fileName,
                'status' => 'PENDING'
            ]);
            
            return redirect()->to('/leaves')->with(['success'=>'Leave Has Been Submited']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Leaves $leaves)
    {
        try
        {
            $leave = $leaves::find($id);
            if(file_exists('/uploads/leaves/'.$leave->document_img))
            File::delete('/uploads/leaves/'.$leave->document_img);
            $leave->delete();
            return redirect()->back()->with(['success'=> 'Leave Deletet Successfull']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }
}
