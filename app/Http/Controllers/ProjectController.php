<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects'] = Project::get();
        return view('project.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $this->validate(request(), [
                'client_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'start_date' => 'required',
                'deadline' => 'required',
            ]);
            Project::create([
                'client_id' => $request->client_id,
                'name' => $request->name,
                'email' => $request->email,
                'start_date' => $request->start_date,
                'deadline' => $request->deadline,
                'description' => $request->description,
            ]);
            return redirect('/project')->with(['success'=>'Project Create Successfull']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data['project'] = $project;
        $data['clients'] = Client::get();
        return view('project.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function assign_project(Request $request)
    {
        $projects = Project::get();
        return response()->json(['success'=>'success','projects'=>$projects]);
    }
    public function update(Request $request, Project $project)
    {
        try
        {
            $this->validate(request(), [
                'client_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'start_date' => 'required',
                'deadline' => 'required',
                'status' => 'required',
            ]);
            $project->update([
                'client_id' => $request->client_id,
                'name' => $request->name,
                'email' => $request->email,
                'start_date' => $request->start_date,
                'deadline' => $request->deadline,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            return redirect('/project')->with(['success'=>'Project Update Successfull']);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
