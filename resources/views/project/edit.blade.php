@extends('layouts.app')

@section('page-title')
Edit Project
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
         <section class="content-header">
          <h1>Edit Project</h1>
        </section>
        <section class="content">    
          <form name="formAdd" id="formAdd" method="POST" action="{{route('project.update',$project->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="box box-primary">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
                            <label for="Project">Project Name <span class="text text-red">*</span></label>
                            <input type="text" name="name" value="{{$project->name}}" class="form-control" id="project" placeholder="Project">
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                            <label for="Project">Email <span class="text text-red">*</span></label>
                            <input type="text" name="email" value="{{$project->email}}" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : null }}">
                            <label for="Project">Start Date <span class="text text-red">*</span></label>
                            <input type="date" name="start_date" value="{{$project->start_date}}" class="form-control" id="project" placeholder="">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('deadline') ? 'has-error' : null }}">
                            <label for="Project">Deadline <span class="text text-red">*</span></label>
                            <input type="date" name="deadline" value="{{$project->deadline}}" class="form-control" id="project" placeholder="">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('client_id') ? 'has-error' : null }}">
                            <label for="Project">Client <span class="text text-red">*</span></label>
                            <select name="client_id" style="width:100%"  required class="form-control">
                                <option>::select client::</option>
                                @foreach($clients as $row)
                                <option value="{{$row->id}}" {{ ($row->id == $project->client_id) ? 'selected' : null}}>{{$row->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('client_id') ? 'has-error' : null }}">
                            <label for="Project">Status <span class="text text-red">*</span></label>
                            <select name="status" style="width:100%" id="status" required class="form-control">
                                <option>::select status::</option>
                                <option value="Not Start" {{ ($project->status == 'Not Start') ? 'selected' : null}}>Not Start</option>
                                <option value="In Progress"  {{ ($project->status == 'In Progress') ? 'selected' : null}}>In Progress</option>
                                <option value="On Hold"  {{ ($project->status == 'On Hold') ? 'selected' : null}}>On Hold</option>
                                <option value="Cancelled"  {{ ($project->status == 'Cancelled') ? 'selected' : null}}>Cancelled</option>
                                <option value="Finished"  {{ ($project->status == 'Finished') ? 'selected' : null}}>Finished</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-grouap {{ $errors->has('description') ? 'has-error' : null }}">
                            <label style="margin-top: 10px;" for="Project">Description <span class="text text-red">*</span></label>
                            <textarea  name="description" class="form-control summernoteExample" id="summernoteExample"  rows="6">{{$project->description}}</textarea>
                        </div>
                    </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" onclick="window.location='{{ URL::previous() }}'" class="btn btn-danger">Cancel</button>
              </div>
            </div>
          </form>    
        </section>
        </div>
    </div>

  @endsection