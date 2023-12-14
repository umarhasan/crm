@extends('layouts.app')


@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Edit User</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit User</li>
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
                    <form method="post" action="{{route('users.update', $user->id)}}">
                      @csrf
                      @method('put')
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <strong>Name:</strong>
                            <input class="form-control" value="{{$user->name}}" name="name" required>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <strong>Email:</strong>
                            <input class="form-control" value="{{$user->email}}" type="email" name="email" required>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <strong>Department:</strong>
                            <select name="department_id" id="" class="form-control">
                              <!-- <option value="" disabled>::select departmemt::</option>
                              @foreach($departments as $department)
                                <option value="{{$department->id}}" {{ ( $department->id == $user->department_id) ? 'selected' : null }} >{{$department->departments}}</option>
                              @endforeach
                            </select> -->
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <strong>Password:</strong>
                            <input class="form-control" type="password" name="password" >
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <input class="form-control" type="password" name="confirm-password" >
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <strong>Role:</strong>
                            <select name="roles[]" class="form-control" required>
                              <option>select role</option>
                              @foreach($roles as $role)
                              <option value="{{$role->id}}" {{ $user->getRoleNames()->contains($role->name) ? 'selected' : '' }}>{{$role->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div> 
              </div>   
            </div>
          </div>
        </section>
      </div>
    </div>
</div>
@endsection