@extends('layouts.app')

@section('page-title')
Edit Client
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
         <section class="content-header">
          <h1>Edit Client</h1>
        </section>
        <section class="content">    
          <form name="formAdd" id="formAdd" method="POST" action="{{route('client.update',$client->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="box box-primary">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-grouap {{ $errors->has('company_name') ? 'has-error' : null }}">
                            <label for="Project">Company Name <span class="text text-red">*</span></label>
                            <input type="text" name="company_name" value="{{$client->company_name}}" required class="form-control" id="project" placeholder="Company Name">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('Category') ? 'has-error' : null }}">
                            <label for="Project">Category <span class="text text-red">*</span></label>
                            <select name="category" style="width:100%" id="exampleSelectGender" required class="form-control">
                                <option value="">::select category::</option>
                                <option value="Web Development" {{ ($client->category == 'Web Development') ? 'selected' : null }}>Web Development</option>
                                <option value="Content Marketing" {{ ($client->category == 'Content Marketing') ? 'selected' : null }}>Content Marketing</option>
                                <option value="Graphic Design" {{ ($client->category == 'Graphic Design') ? 'selected' : null }}>Graphic Design</option>
                                <option value="App Development" {{ ($client->category == 'App Development') ? 'selected' : null }}>App Development</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : null }}">
                            <label for="Project">First Name <span class="text text-red">*</span></label>
                            <input type="text" name="first_name" value="{{$client->first_name}}" required class="form-control" id="title" placeholder="First Name">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : null }}">
                            <label for="Project">Last Name <span class="text text-red">*</span></label>
                            <input type="text" name="last_name" value="{{$client->last_name}}" required class="form-control" id="title" placeholder="Last Name">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                            <label for="Project">Email <span class="text text-red">*</span></label>
                            <input type="email" name="email" value="{{$client->email}}" required class="form-control" id="title" placeholder="Email">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
                            <label for="Project">Password <span class="text text-red">*</span></label>
                            <input type="password" name="password" value="{{$client->password}}" readonly required class="form-control" id="title" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
                            <label for="Project">Phone <span class="text text-red">*</span></label>
                            <input type="number" name="phone" value="{{$client->phone}}" required class="form-control" id="title" placeholder="">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
                            <label for="Project">Telephone <span class="text text-red">*</span></label>
                            <input type="number" name="telephone" value="{{$client->telephone}}" required class="form-control" id="title" placeholder="">
                        </div>
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
                            <label for="Project">Description  <span class="text text-red">*</span></label>
                            <textarea  name="description" class="form-control summernoteExample" id="summernoteExample"  rows="6"> {{ $client->description }} </textarea>
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