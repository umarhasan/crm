@extends('layouts.front_master')
@section('page-title')
Home
@endsection
@section('content')

    <!-- //////////HEADER/////////// -->
    <section>
    <!-- //////////BANNER/////////// -->  
        <div class="banner-main">
            <div class="banner-1">
            <video src="{{asset('/uploads/cms/'.$slider->slider_video)}}" muted autoplay loop></video>
            <div class="container">
                <div data-aos="fade-down" class="content">
                <h2>{{ ($slider) ? $slider->slider_content_1 : 'WELCOME TO' }}</h2>
                <h1>{{ ($slider) ? $slider->slider_content_2 : 'InfiniX' }}</h1>
                <h4>{{ ($slider) ? $slider->slider_content_3 : 'Pleasure Together, Wherever' }}</h4>
                <a href="#" class="btn btn-primary">Login</a>
                </div>
            </div>
            </div>
            <div class="banner-2">
                <div class="container">
                    <div data-aos="fade-down" class="content">
                    <h1>SEX TOYS DILDO</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum orci dui, ut euismod orci ornare sit amet. Aliquam malesuada congue enim quis posuere. Sed tempor</p>
                    <a href="#" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
            <div class="banner-3">
                <div class="container">
                    <div data-aos="fade-down" class="content">
                    <h1>PLEASURE TOGETHER, WHEREVE</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum orci dui, ut euismod orci ornare sit amet. Aliquam malesuada congue enim quis posuere. Sed tempor</p>
                    <a href="#" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////BANNER/////////// -->  

        <!-- //////////PRODUCT SECTION/////////// -->  
        <div class="product-sec">
            <div class="container">
            <div class="row">
                <div class="col-7">
                <div data-aos="fade-down" class="heading">
                    <h2>{{ ( $middel[0] )  ? $middel[0]->slider_content_1 : 'REMOTE CONTROL SEX TOYS'}}</h2>
                    <p>{{ ( $middel[0] )  ? $middel[0]->description : "The world's leading interactive sex toys"}}</p>
                </div>
                </div>
                <div class="col-5">
                    <div data-aos="fade-left" class="product-details about-products sex-toise1">
                        <img class="sex-toy" width="110px" src="assets/imgs/sex-toy.png">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div data-aos="fade-left" class="content">
                                    <h2>{{ ($productasc) ? $productasc->product_name : null}}</h2>
                                        <p>{{ ($productasc) ? $productasc->description : null}}</p>
                                        <span class="price">$ {{ ($productasc) ? $productasc->regular_price : null}}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="product-img imager-slider">
                                        <a href="#"><img width="350px" src="{{asset('/uploads/product/'.$productasc->product_image)}}"></a>
                                        @forelse($productasc->images as $row)
                                        <a href="#"><img width="350px" src="{{asset('/uploads/product/gallery/'.$row->product_image)}}"></a>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                <!-- /////////////////////// -->
                <div class="container second-pros">
                    <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-5">
                        <div data-aos="fade-down" class="product-details about-products pro-infinix">
                            <img class="infinix" width="260px" src="{{asset(( $middel[0] )  ? '/uploads/cms/'.$middel[0]->slider_image : null)}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div data-aos="fade-left" class="content">
                                        <h2>{{ ( $middel[1] )  ? $middel[1]->slider_content_1 : 'REMOTE CONTROL SEX TOYS'}}</h2>
                                        <p>{{ ( $middel[1] )  ? $middel[1]->description : 'Lorem ipsum dolor sit amet, cons ectetur adipiscing elit. Nullam ut felis ac quam efficitur vulputate. Duis sagittis.'}}</p>
                                        <!-- <span class="price">$ 45,743</span> -->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="product-img">
                                            <a href="#"><img width="330px" src="{{asset(( $middel[1] )  ? '/uploads/cms/'.$middel[1]->slider_image : null)}}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div data-aos="fade-down" class="product-details about-products sex-toise2">
                            <img class="sex-toy" width="110px" src="assets/imgs/sex-toy.png">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product-img imager-slider sextoy-two">
                                            <a href="#"><img width="350px" src="{{asset('/uploads/product/'.$productdsc->product_image)}}"></a>
                                            @forelse($productdsc->images as $row)
                                            <a href="#"><img width="350px" src="{{asset('/uploads/product/gallery/'.$productdscrow->product_image)}}"></a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div data-aos="fade-left" class="content">
                                        <h2>{{ ($productdsc) ? $productdsc->product_name : null}}</h2>
                                        <p>{{ ($productdsc) ? $productdsc->description : null}}</p>
                                        <span class="price">$ {{ ($productasc) ? $productasc->regular_price : null}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
        <!-- //////////PRODUCT SECTION/////////// --> 

        <!-- //////////VIDEO CAROUSEL/////////// --> 
        <div id="video-carousel">
            <div class="container">
            <div class="row">
                <div data-aos="fade-down" class="heading">
                    <h2>{{ ( $middel[2] )  ? $middel[2]->slider_content_1 : 'SYNC TO MUSIC'}}</h2>
                    <p>{{ ( $middel[2] )  ? $middel[2]->description : "Sync your toy to the club's playlist and your toy will vibe out to the beat."}}</p>
                </div>
                <div class="column small-11 small-centered">
                    <div class="slider slider-single">
                        @forelse($video as $vid)
                        <video wzdth="320" height="240" controls="false" autoplay="autoplay" muted="ture"><source src="{{asset('/uploads/cms/'.$vid->slider_video)}}" type="video/mp4"></video>
                        @empty
                        @endforelse
                    </div>
                    <div data-aos="fade-up" class="slider slider-nav">
                        @forelse($video as $vid)
                        <img width="320" height="240" src="{{asset('/uploads/cms/'.$vid->slider_image)}}">
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- //////////VIDEO CAROUSEL/////////// -->

        <!-- //////////PRODUCTS CAROUSEL/////////// --> 
        <div id="products-carousel">
            <div class="container">
            <div class="row">
                <div data-aos="fade-down" class="heading">
                    <h2>{{ ( $middel[3] )  ? $middel[3]->slider_content_1 : ''}}</h2>
                    <p>{{ ( $middel[3] )  ? $middel[3]->description : "The world's leading interactive sex toys"}}</p>
                </div>
            </div>
            </div>
            <div class="product-grid  ">
            <div class="container ">
                <div class="row producter-slider">
                    @forelse($products as $product)
                        <div data-aos="fade-left" class="product-item">
                            <div class="pro-img">
                                <a href="#"><img src="{{asset('uploads/product/'.$product->product_image)}}"></a>
                                <div class="btns-funct">
                                <a data-id="{{$product->id}}" class="add-cart funt-btn basket" href="javascript:;"><img src="assets/imgs/basket.png">
                                    <span class="tooltiptext">Add to Cart</span></a>
                                <a class="funt-btn eye" href="#"><img src="assets/imgs/eye.png">
                                    <span class="tooltiptext">Quick View</span></a>
                                <a data-id="{{$product->id}}" class="add-wishlist funt-btn wish" href="javascript:;"><img src="assets/imgs/wish.png">
                                    <span class="tooltiptext">Wishlist</span></a>
                                </div>
                            </div>
                            <div class="pro-content">
                                <p>{{$product->product_name}}.</p>
                                <span class="price">$ <span id="product_price-{{$product->id}}"> {{$product->regular_price}}</span> </span>
                                <a href="javascript:;" data-id="{{$product->id}}" class="add-cart btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //////////PRODUCTS CAROUSEL/////////// --> 

    <!-- //////////NEW LOOKBOOK/////////// -->
    <div class="lookbook">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div data-aos="fade-down" class="heading">
                        <h2>NEW <div class="divider"></div></h2>
                        <h2>LOOKBOOK </h2>
                </div>
                </div>
                <div class="col-5">
                    <div class="div"></div>
                </div>
            </div>
        </div>
        <div class="lookbook-about">
            <div class="container">
                <div class="row">
                    <div data-aos="fade-up" class="col-6">
                        <div class="lookbook-details lookone">
                            <div class="lookbook-img">
                                <img src="{{ ( $middel[4] )  ? asset('/uploads/cms/'.$middel[4]->slider_image) : ''}}">
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-down" class="col-6">
                        <div class="lookbook-details looksec">
                            <div class="lookbook-img">
                                <img src="{{ ( $middel[5] )  ? asset('/uploads/cms/'.$middel[5]->slider_image) : ''}}">
                            </div>
                            <div class="lookbook-content">
                                <img width="40px" src="{{asset('/assets/imgs/qoutes.png')}}">
                                <p>{{ ( $middel[5] )  ? $middel[5]->description : 'It is a long established fact that a reader will be distracted by the readable'}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //////////NEW LOOKBOOK/////////// -->

    <!-- //////////NEWSLETTER/////////// -->
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right" class="col-6 form-colm">
                    <form class="subscribe">
                        <div class="container">
                        <h2>{{ ( $middel[6] )  ? $middel[6]->slider_content_1 : ''}}</h2>
                        <p>{{ ( $middel[6] )  ? $middel[6]->description : 'Sign up for our newletter to recevie updates and exlusive offers'}}</p>
                        </div>
                        <div class="container">
                        <div class="row">
                        <input type="text" placeholder="Email address" name="mail" required>
                        <input type="submit" value="Subscribe">
                        </div>
                        </div>
                    </form>                  
                </div>
                <div data-aos="fade-left" class="col-6">
                    <img class="sub-image" width="100%" src="{{ ($middel[6]) ? asset('/uploads/cms/'.$middel[6]->slider_image) : null }}">
                </div>
            </div>
        </div>
    </div>
    <!-- //////////NEWSLETTER/////////// -->

    </section>
    
    
@endsection