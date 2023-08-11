@extends('layouts.app')

@section('title', 'Change Password')

@section('page_heading', 'Change Password')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('store_change_password')}}" method="post" class="validatedForm" enctype="multipart/form-data">
    			@csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">

                    	<div class="form-group">
	                        <label>Old Password</label>
	                        <code>*</code>
	                        <input name="oldpassword" type="password" class="form-control" required>
	                    </div>

                        <div class="form-group">
	                        <label>New Password</label>
	                        <code>*</code>
	                        <input name="newpassword" id="password" minlength="8" type="password" class="form-control" required>
	                    </div>
                        <div class="form-group">
	                        <label>Confirm Password</label>
	                        <code>*</code>
	                        <input name="password_confirmation" data-rule-equalTo="#password" type="password" class="form-control" required>
	                    </div>
                	</div>



                  </div>
				</div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
    <!-- /.content -->



@endsection

@push('scripts')
<!-- Select2 -->
<script src="{{asset('assets/backend_assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">


$(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})

</script>

<!-- Ekko Lightbox -->
<script src="{{asset('assets/backend_assets/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>

<!-- Page specific script -->
<script>
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
})
</script>

<script>
var loadFile = function(event) {
    var image = document.getElementById('output');
    var a_image = document.getElementById('a_output');

    image.src = URL.createObjectURL(event.target.files[0]);
    a_image.href = URL.createObjectURL(event.target.files[0]);

    image.width=420;
    image.height=221;

    /*image.width=260;
    image.height=151;*/
};
</script>
<script type="text/javascript">
    $('.validatedForm').validate({
        rules : {
            password : {
                minlength : 8
            },
            password_confirmation : {
                minlength : 8,
                equalTo : "#password"
            }
        }



});
   $('button').click(function(){
    $('.validatedForm').valid();
});
</script>
@endpush

@push('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endpush
