@extends('layouts.app')

@section('page-title')
Create Leave
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Create Leave</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Create Leave</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <form name="formAdd" id="formAdd" method="POST" action="{{route('leaves.store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="box box-primary">
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Employee Name:</strong>
                              <input type="text" name="employee_id" class="form-control" id="employee_id" placeholder="employee id" value="{{ Auth::user()->name }}" readonly>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>leave Type:</strong>
                              <input type="text" name="leave_type" class="form-control"  placeholder="Leave Subject" >
                            </div>
                          </div>
                          
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>leave Duration:</strong>
                              <input type="text" name="duration" class="form-control"  placeholder="Duration" >
                            </div>
                          </div>
                          
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <strong>Document:</strong>
                              <input type="file" name="document_img" class="form-control" id="document_img" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <strong>Reason:</strong>
                              <textarea name="reason" rows="8" class="form-control" required=""></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" onclick="window.location='{{ URL::previous() }}'" class="btn btn-danger">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div> 
        </div>   
      </section>
    </div>
  </div>

@endsection