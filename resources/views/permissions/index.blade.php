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
            <h1>Permissions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permissions</li>
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
                <h3 class="card-title">Permissions List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
                @can('permission-create')  
                <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Permission</a>
                @endcan
                <!-- <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a> -->
                </div>
              <div class="card-body">
              <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>permission</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($permissions)
                  @php
                  $id =1;
                  @endphp
                  @foreach($permissions as $key =>  $permission)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $permission->name }}</td>
                      <td>
                            <div class="btn-group">
                              @can('permission-edit')
                              <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}"><i class="fa fa-edit"></i></a>    
                              @endcan
                              @can('permission-delete')  
                              <form method="post" action="{{route('permission.destroy',$permission->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are You Sure Want To Delete This.??')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              </form>
                              @endcan
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
  </div>
  </div>


@endsection