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
            <h1>Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">
    
        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                  <form method="post" action="{{route('roles.update', $role->id)}}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input name="name" value="{{$role->name}}" placeholder="Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class=" form-group">
                                <strong>Permission:</strong>
                                <div class="row ps-lg-4">
              
                                @foreach($permission as $value)
                
                                <div class="col-lg-4">
                                  <div class="my-txt-box">
                                    <input type="checkbox" 
                                      name="permission[]" {{ in_array($value->name, $rolePermissions) 
                                    ? 'checked'
                                    : '' }} value="{{$value->id}}" class="name form-check-input">
                                    <label class="my-label" for="checkboxSuccess2">{{ $value->name }} </label>
                                  </div>
                                  </div>    
                                @endforeach
                           </div>
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
  <script>

$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": []
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
 
 var APP_URL = {!! json_encode(url('/')) !!}



 
</script>
<style>
  .form-check-input{
    border-radius: 0 !important;
    height: 20px;
    width: 20px;
    margin:0;
  }
  
  .form-group strong{
    margin: 0 0 10px;
    width: fit-content;
    display: block;
  }

  .my-txt-box{
    padding: 0 0 10px;
  }
  
  .my-label{
    padding-left: 30px;
    text-transform:capitalize;
  }
  </style>


@endsection
