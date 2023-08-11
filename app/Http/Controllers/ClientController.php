<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Hash;

class ClientController extends Controller
{
    public function index()
    {
        $data['clients'] = Client::get();
        return view('client.index',$data);
    }
    
    public function create()
    {
        return view('client.create');
    }
    
    public function store(Request $request)
    {
        try
        {
            $this->validate(request(), [
                'company_name' => 'required',
                'category' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'telephone' => 'required',
                'description' => 'required',
            ]);

            Client::create([
                'company_name' => $request->company_name,
                'category' => $request->category,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->passwprd),
                'description' => $request->description,
            ]);
            return redirect('/client')->with(['success'=>'Client Create Successfull']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    
    public function show(Client $client)
    {
        //
    }
    
    public function edit(Client $client)
    {
        $data['client'] = $client;
        return view('client.edit',$data);
    }

    public function update(Request $request, Client $client)
    {
        try
        {
            $this->validate(request(), [
                'company_name' => 'required',
                'category' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'telephone' => 'required',
                'description' => 'required',
            ]);
            $client->update([
                'company_name' => $request->company_name,
                'category' => $request->category,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'telephone' => $request->telephone,
                'description' => $request->description,
            ]);
            return redirect('/client')->with(['success'=>'Client Update Successfull']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */

    public function assign_client(Client $client)
    {
        try
        {
            return response()->json(['success'=>'success','clients'=>$client->get()]);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function destroy(Client $client)
    {
        try
        {
            $client->delete();
            return redirect()->back()->with(['success'=>'Client Delete Successfully']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
