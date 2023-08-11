@extends('layouts/app')

@section('title', 'Product')

@section('page_heading', 'Product Images')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">

        @php
        $g_imgs = json_decode($product->gallery_images);
      
        @endphp

        @if($product->images)
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4 class="card-title">{{$product->product_name}} Images</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @foreach($product->images as $gi)
                            <div class="col-sm-2 border-bottom mb-2">
                                <a href="{{ asset('/uploads/product/gallery/'.$gi->product_image) }}" data-toggle="lightbox" data-title="{{$product->product_name}}" data-gallery="gallery">
                                        <img src="{{ asset('/uploads/product/gallery/'.$gi->product_image) }}" class="img-fluid mb-2" alt="{{$product->product_name}}">
                                </a>

                                <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="window.location='{{url("admin/product/image/".$gi->id."/delete")}}'">
                                        Delete
                                </button>
                                <!-- <a href="{{-- URL::route('admin.product.image.delete',$primg->id) --}}" class="btn btn-outline-link btn-lg btn-block">Delete</a> -->

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-12">

            <div class="card card-secondary">
                <div class="card-header">
                    <h4 class="card-title">Upload Image</h4>
                </div>
                <form class="uploader" action="{{ url('product/'.$product->id.'/images') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="images[]" multiple required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Upload</button>
                        </div>
                </form>

            </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
</div><!-- /.container-fluid -->
  <!-- /.content -->
@endsection

@push('scripts')
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

        image.width=260;
        image.height=151;

        /*image.width=260;
        image.height=151;*/
    };

</script>

@endpush

@push('css')
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{asset('assets/backend_assets/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endpush
