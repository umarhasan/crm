@extends('layouts/app')
@section('title', 'Product')
@section('page_heading', 'Product Edit')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
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
         <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Product <small>information</small></h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12">
                            
                           <div class="form-group">
                              <label>Categories</label>
                              <select name="category_id" class="form-control" data-placeholder="Select a Child Category" style="width: 100%;">
                              @foreach($categories as $category)
                              <option value="{{$category->id}}" @if($category->id == $product->category_id) @endif>{{$category->category_name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                           <label>Sub Categories</label>
                           <select name="subcat_id" class="form-control" data-placeholder="Select a Category" style="width: 100%;">
                              @foreach($product->subcat as $row)
                                 <option value="{{$category->id}}" @if($row->id == $product->subcat_id) @endif>{{$row->category_name}}</option>
                                 @endforeach
                              </select>
                           </div>

                                
                           <label for="product_name" class="control-label mb-1">Product Name</label>
                           <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                           
                           
                           
                           <label for="regular_price" class="control-label mb-1"> Price</label>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="regular_price" value="{{$product->regular_price}}">
                              <div class="input-group-append">
                                 <span class="input-group-text">.00</span>
                              </div>
                           </div>
                           
                           
                           
                           {{--  
                           <div class="col-3">
                              <label for="sale_price" class="control-label mb-1">Sale Price</label>
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" name="sale_price" value="{{$product->sale_price}}">
                                 <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                 </div>
                              </div>
                           </div>
                           --}}
                           <!-- textarea -->
                           <div class="form-group">
                              <label>Stock OR Quantity</label>
                              <input type="number" value="{{$product->stock}}" class="form-control" name="stock" value="{{old('stock')}}">
                           </div>
                           <div class="form-group">
                              <label>Size</label>
                              <input type="checkbox" @if($product->has_size =='on') checked @endif id="size" style="width:20px" onclick="showsize()" class="form-control" name="size" >
                           </div>
                           <span id="customsize">
                              @php
                              $row = 0
                              @endphp
                              @foreach($product->size as $key => $val)
                              @php
                              $row ++;
                              @endphp
                              <div class="row" id="size-{{$row}}" >
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label>size name</label>
                                       <input required="" value="{{$val->name}}" type="text" class="form-control" name="size_name[]">
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label>size Quantity</label>
                                       <input required="" value="{{$val->quantity}}" type="number" class="form-control" name="size_quantity[]" >
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label>size Price</label>
                                       <input required="" value="{{$val->price}}" type="number" class="form-control" name="size_price[]" >
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <button class="btn btn-info" type="button" onclick="addsize({{$row}})">
                                          <i class="fa fa-plus"></i>
                                       </button>
                                       @if($row >1)
                                       <button class="btn btn-danger" type="button" onclick="removesize({{$row}})"><i class="fa fa-trash"></i></button>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </span>
                           
                           <div class="form-group">
                              <label>Color</label>
                              <input type="checkbox" @if($product->has_color =='on') checked @endif id="color" style="width:20px" onclick="showcolor()" class="form-control" name="color" >
                           </div>
                           <span id="customcolor">
                           @php
                              $row = 0
                              @endphp
                              @foreach($product->color as $key => $val)
                              @php
                              $row ++;
                              @endphp
                              <div class="row" id="color-{{$row}}" >
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label>size name</label>
                                       <input required="" value="{{$val->name}}" type="text" class="form-control" name="color_name[]">
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label>size Quantity</label>
                                       <input required="" value="{{$val->quantity}}" type="number" class="form-control" name="color_quantity[]" >
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <label>size Price</label>
                                       <input required="" value="{{$val->price}}" type="number" class="form-control" name="color_price[]" >
                                    </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form-group">
                                       <button class="btn btn-info" type="button" onclick="addcolor({{$row}})">
                                          <i class="fa fa-plus"></i>
                                       </button>
                                       @if($row >1)
                                       <button class="btn btn-danger" type="button" onclick="removecolor({{$row}})"><i class="fa fa-trash"></i></button>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </span>
                           <div class="form-group">
                              <label>Long Description</label>
                              <textarea class="form-control" id="summernote" rows="3" name="description">
                              {{$product->description}}
                              </textarea>
                           </div>
                           <div class="form-group">
                              <label for="customFile">Product Image</label>
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="product_image" onchange="loadFile(event)">
                                 <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                           </div>
                           <!-- <div class="col-sm-6"> -->
                           <a href="{{ asset('uploads/product/'.$product->product_image) }}" data-toggle="lightbox" id="a_output" data-title="Product Image" data-gallery="gallery">
                           <img src="{{ asset('uploads/product/'.$product->product_image) }}" id="output" class="img-fluid mb-2" width="260" height="151" />
                           </a>
                           <!-- </div> -->
                           
                           
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
   </div>
   <!-- /.container-fluid -->
</section>
</div>
<!-- /.content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
   var count = {{$row}};
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
