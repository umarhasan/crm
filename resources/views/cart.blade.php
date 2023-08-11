@extends('layouts.front_master')
@section('page-title')
Cart 
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Cart Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @if($cart)
                        @foreach($cart as $row)
                     
                        <tr id="tr-{{$row->id}}">
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> {{$row->product->product_name}}</td>
                            <td class="align-middle">$<span id="price-{{$row->id}}"> {{$row->product_price}}</span</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto"  style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus cartbtn-{{$row->id}}" data-type="minus" onclick="cartminus({{$row->id}})" type="button">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input readonly pattern=".{1}" class="form-control form-control-sm bg-secondary text-center  quantity-val-{{$row->id}}" data-product="{{$row->product_id}}" min="1" value="{{$row->quantity}}">
                                    <div class="input-group-btn">
                                        <button onclick="cartplus({{$row->id}})" id="plus" type="button" class="btn btn-sm btn-primary btn-plus cartbtn-{{$row->id}}">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$<span id="total-{{$row->id}}">{{$row->product_price * $row->quantity}}</span></td>
                            <td class="align-middle"><button onclick="removecart({{$row->id}})" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <!-- <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form> -->
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <!-- <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div> -->
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">$<span id="subtotal">{{$total}}</span></h5>
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    @endsection
