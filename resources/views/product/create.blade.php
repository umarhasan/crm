@extends('layouts.app')
@section('title', 'Product')
@section('page_heading', 'Product Create')
@section('breadcrumb')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
   <div class="row">
   <!-- left column -->
   <div class="col-lg-12">
   <!-- jquery validation -->
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Product <small>information</small></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form id="createProduct" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="card-body">
            <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Category</label>
                     <select name="category_id" class="form-control"  data-placeholder="Select a Category" style="width: 100%;">
                        <option value="">--Select category--</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                     </select>
                  </div>
                  
                  <div class="form-group">
                     <label>Sub Categories</label>
                     <select name="subcat_id" class="form-control" data-placeholder="Select a Category" style="width: 100%;">
                        
                     </select>
                  </div>
                  
                 
                  
                  
                  <label for="product_name" class="control-label mb-1">Product Name</label>
                  <input type="text" id="product_name" class="form-control" name="product_name" value="{{old('product_name')}}" required>
                  
                  
                  
                  <label for="regular_price" class="control-label mb-1"> Price</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="regular_price" value="{{old('regular_price')}}">
                     <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                     </div>
                  </div>
                  
                   <!-- <label for="regular_price" class="control-label mb-1">Item Price</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="pr_item_price" value="{{old('pr_item_price')}}">
                     <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                     </div>
                  </div> -->
                  
                  
                  
                  {{--  
                  <div class="col-3">
                     <label for="sale_price" class="control-label mb-1">Sale Price</label>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" name="sale_price" value="{{old('sale_price')}}">
                        <div class="input-group-append">
                           <span class="input-group-text">.00</span>
                        </div>
                     </div>
                  </div>
                  --}}
                  <div class="form-group">
                     <label>Stock OR Quantity</label>
                     <input type="number" value="1" class="form-control" name="stock" value="{{old('stock')}}">
                  </div>
                  <div class="form-group">
                     <label>Size</label>
                     <input type="checkbox" id="size" style="width:20px" onclick="showsize()" class="form-control" name="size" >
                  </div>
                  <span id="customsize">
                     
                  </span>
                  
                  <div class="form-group">
                     <label>Color</label>
                     <input type="checkbox" id="color" style="width:20px" onclick="showcolor()" class="form-control" name="color" >
                  </div>
                  <span id="customcolor">
                     
                  </span>
                  <div class="form-group">
                     <label>Description</label>
                     <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="customFile">Product Image</label>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="product_image" onchange="loadFile(event)">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                     </div>
                  </div>
                  <!-- <div class="col-sm-6"> -->
                  <a data-toggle="lightbox" id="a_output" data-title="Product Image" data-gallery="gallery">
                  <img id="output" class="img-fluid mb-2"/>
                  </a>
                  <!-- </div> -->
                  
                  
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
   </div>
   <!-- /.container-fluid -->
</section>
</div>
<!-- /.content -->

<script>
   
   var count = 1;
   // Size
   function showsize(){
      if($('#size').is(':checked'))
      {
         $("#customsize").append('<div class="row" id="size-'+count+'" ><div class="col-3"><div class="form-group"><label>size name</label><input required="" type="text" class="form-control" name="size_name[]"></div></div><div class="col-3"><div class="form-group"><label>size Quantity</label><input required="" type="number" class="form-control" name="size_quantity[]" ></div></div><div class="col-3"><div class="form-group"><label>size Price</label><input required="" type="number" class="form-control" name="size_price[]" ></div></div><div class="col-3"><div class="form-group"><button class="btn btn-info" type="button" onclick="addsize('+count+')"><i class="fa fa-plus"></i></button></div></div></div>');
      }
      else
      {
         $("#customsize").empty();
      }
   }
   function addsize(val){
      count++;
         $("#customsize").append('<div class="row" id="size-'+count+'" ><div class="col-3"><div class="form-group"><label>size name</label><input required="" type="text" class="form-control" name="size_name[]" ></div></div><div class="col-3"><div class="form-group"><label>size Quantity</label><input required="" type="number" class="form-control" name="size_quantity[]" ></div></div><div class="col-3"><div class="form-group"><label>size Price</label><input required="" type="number" class="form-control" name="size_price[]" ></div></div><div class="col-3"><div class="form-group"><button class="btn btn-danger" type="button" onclick="removesize('+count+')"><i class="fa fa-trash"></i></button><button class="btn btn-info" type="button" onclick="addsize('+count+')"><i class="fa fa-plus"></i></button></div></div></div>');
   }
   function removesize(val){
         $("#size-"+val).remove();
   }
   
   // color
   function showcolor(){
      if($('#color').is(':checked'))
      {
         $("#customcolor").append('<div class="row" id="color-'+count+'" ><div class="col-3"><div class="form-group"><label>color name</label><input required="" type="text" class="form-control" name="color_name[]" ></div></div><div class="col-3"><div class="form-group"><label>color Quantity</label><input required="" type="number" class="form-control" name="color_quantity[]" ></div></div><div class="col-3"><div class="form-group"><label>color Price</label><input required="" type="number" class="form-control" name="color_price[]" ></div></div><div class="col-3"><div class="form-group"><button class="btn btn-info" type="button" onclick="addcolor('+count+')"><i class="fa fa-plus"></i></button></div></div></div>');
      }
      else
      {
         $("#customcolor").empty();
      }
   }
   function addcolor(val){
      count++;
         $("#customcolor").append('<div class="row" id="color-'+count+'" ><div class="col-3"><div class="form-group"><label>color name</label><input required="" type="text" class="form-control" name="color_name[]" ></div></div><div class="col-3"><div class="form-group"><label>color Quantity</label><input required="" type="number" class="form-control" name="color_quantity[]" ></div></div><div class="col-3"><div class="form-group"><label>color Price</label><input required="" type="number" class="form-control" name="color_price[]" ></div></div><div class="col-3"><div class="form-group"><button class="btn btn-danger" type="button" onclick="removecolor('+count+')"><i class="fa fa-trash"></i></button><button class="btn btn-info" type="button" onclick="addcolor('+count+')"><i class="fa fa-plus"></i></button></div></div></div>');
   }
   function removecolor(val){
         $("#color-"+val).remove();
   }


   $('select[name="category_id"]').on('change', function () {
      var catId = $(this).val();
      if (catId) {
         $.ajax({
               url: '/subcatories/' + catId,
               type: "GET",
               dataType: "json",
               success: function (data) {
                  $('select[name="subcat_id"]').empty();
                  $.each(data.success, function (key, value) {
                     $('select[name="subcat_id"]').append('<option value=" ' + key + '">' + value.category_name + '</option>');
                  })
               }

         })
      } else {
         $('select[name="subcat_id"]').empty();
      }
   });
</script>
@endsection
