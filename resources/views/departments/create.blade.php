@extends('layouts.app')

@section('page-title')
Create Departments
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
         <section class="content-header">
          <h1>Create Departments<small>All * field required</small></h1>
        </section>
        <section class="content">    
          <form name="formAdd" id="formAdd" method="POST" action="{{route('department.store')}}" enctype="multipart/form-data">
            @csrf
            
            <div class="box box-primary">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-grouap {{ $errors->has('departments') ? 'has-error' : null }}">
                      <label for="departments">Department <span class="text text-red">*</span></label>
                      <input type="text" name="departments" class="form-control" id="departments" placeholder="Department">
                      <span class="text-danger">{{-- {{ $errors->first('full_name') }} --}}</span>
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