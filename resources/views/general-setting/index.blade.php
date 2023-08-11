@extends('layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update General Setting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update General Setting</li>
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
                  <form method="post" action="{{route('general_setting.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Site Name:</strong>
                                <input class="form-control" name="title" value="{{ ($data) ? $data->title : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Logo:</strong>
                                <input class="form-control" type="file" name="logo" {{ ($data) ? null : 'required' }}>
                                <span>Current Logo</span><br>
                                @if($data)
                                <img src="{{asset('/uploads/logo/'.$data->logo)}}" alt="">
                                @else
                                Empty
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input class="form-control" name="email" type="email" value="{{ ($data) ? $data->email : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone:</strong>
                                <input class="form-control" name="phone" value="{{ ($data) ? $data->phone : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <input class="form-control" name="address" value="{{ ($data) ? $data->address : null}}" required>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Copyright:</strong>
                                <input class="form-control" name="copyright" value="{{ ($data) ? $data->copyright : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Facebook:</strong>
                                <input class="form-control" name="facebook" value="{{ ($data) ? $data->facebook : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Twitter:</strong>
                                <input class="form-control" name="twitter" value="{{ ($data) ? $data->twitter : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Instagram:</strong>
                                <input class="form-control" name="instagram" value="{{ ($data) ? $data->instagram : null}}" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Youtube:</strong>
                                <input class="form-control" name="youtube" value="{{ ($data) ? $data->youtube : null}}" required>
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
@endsection