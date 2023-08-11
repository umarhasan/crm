@extends('layouts.app')


@section('content')
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Role List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
              @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
                <!-- <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a> -->
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Roles</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($roles)
                  @php
                  $id =1;
                  @endphp
                  @foreach($roles as $key =>  $role)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $role->name }}</td>
                      <td>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            @can('role-edit')
                          <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                          @endcan
                          
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Roles</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
{!! $roles->render() !!}

@endsection