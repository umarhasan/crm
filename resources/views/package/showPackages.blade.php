@extends('layouts.app')

@section('title')
  Admin | Packages
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Packages</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Packages</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
<div class="card card-primary card-outline">
          <div class="card-header">
           <?php 
                 $page = Request::segment(2);
                 $pg = ucfirst($page);
           ?>
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              <?=$pg?> Add Details to <?=$pg?> Page
            </h3>

            <?php $pageLink = 'admin/'.Request::segment(2).'/add-content'; ?>
            @can('package-create')
            <a href="{{route('packages.create')}}">
             <div style="text-align: right;"><button class="btn btn-dark btn-sm">Add <?=$pg?></button></div>
            </a>
            @endcan

          </div>

          <div class="card-body">
             @if($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
              </div>
            @endif
            
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                <div class="container">
                  
                  <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Home Page Data</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Price</th>
                    <!-- <th>Phone</th>
                    <th>Message</th> -->
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($Packages as $pkg)
                    <tr>
                      <td>{{$pkg->id}}</td>
                      <td>{{$pkg->title}}</td>
                      <td>${{$pkg->price}}</td>
                      <td>
                      @can('package-edit')
                      <a class="btn" href="{{route('packages.edit',$pkg->id)}}"><i style="color: #c49f47;" class="fas fa-pen-square"></i></a>
                      @endcan
                      
                      @can('package-delete')
                      <form action="{{route('packages.destroy',$pkg->id)}}" method="post">
                        @csrf
  	                    @method('delete')
                        <button class="btn" onclick="return confirm('Are You Sure Want to Delete this.??')"><i style="color: #bd0a0a;" class="fa fa-trash" aria-hidden="true">
                        </i></button> 
                      </form>
                      @endcan


                      </td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                    
                  
                  
                </div>
              </div>
             
            </div>
            
          </div>
          <!-- /.card -->
        </div>


    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sg">
      <div class="modal-content">
        <div class="modal-header">
          
          <h5 class="modal-title">Detail</h5>
        </div>
        <div class="modal-body">
        <div class="table">
        <table class="table table-hover Inquiries">
        <!-- <tbody class="Inquiries"> -->
        <!-- <tr><th>id #</th><td>4</td></tr>
        <tr>
        <th>Name</th>
        <td>Conse</td>
        </tr>
        <tr><th>Email</th>
        <td>pisowusav@mailinator.com</td>
        </tr>
        <tr><th>Phone</th>
        <td>132123123</td>
        </tr>
        <tr>
        <th>Message</th>
        <td>Labor</td>
        </tr>
        <tr>
        <th>Created</th>
        <td>2020-12-28 20:00:31</td>
        </tr> -->

        <!-- </tbody> -->
    </table>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@push('footer-scripts')
<script type="text/javascript">
   $(document).on('click','.showDetail',function(){
      var recordId = $(this).attr('id');
      $.ajax({
          url:'get/Inquiry',
          dataType:'json',
          data: { "id": recordId,"_token": "{{ csrf_token() }}"},
          method:'post',
          success: function(response){

            $.each(response, function (key, value) 
                {
                    $('.Inquiries').html(
                        '<tr><th>Id</th> <td>' + value.id + '</td></tr><tr><th>Name</th><td>' + value.name + '</td></tr><tr><th>Email</th> <td>' + value.email + '</td></tr><tr><th>Phone</th> <td>' + value.phone +'</td></tr><tr><th>Message</th><td>'+value.message+'</td></tr>');
                })

                $('#myModal').modal('show');

          }

      });
   });
 </script>

 @endpush
