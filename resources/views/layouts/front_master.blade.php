
<title>Infinix</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{asset('assets/imgs/logo.png')}}" type="image/png">
<link rel="stylesheet" href="{{asset('assets/style.css')}}" />
<!-- //////////AOS/////////// -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- //////////BOOTSTRAP/////////// -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- //////////FONT/////////// -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!-- //////////Font-Awesome/////////// -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<!-- //////////SLICK_SLIDER/////////// -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('/admin/plugins/toastr/toastr.min.css')}}">
</head>

<body class="header-relative">
    <div class="fullscreen-bg">
        <video muted autoplay id="fullscreen-bg-video">
            <source src="{{asset('assets/imgs/video.mp4')}}">
        </video>
    </div> 
    <!-- //////////HEADER/////////// -->
    <header id="myheader">
        <div class="container sticky-lg-top">
            <div class="logo-nav">
                <img src="{{ ($generalsetting) ? asset('/uploads/logo/'.$generalsetting->logo) : null }}">
                <nav>
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown dropdown-hover position-static">
                    <a href="#" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                    <div class="dropdown-menu megamenu" aria-labelledby="navbarDropdown">
                        <div class="row g-3">
                            <div class="col">
                                <div class="col-megamenu">
                                    <a href="#">
                                    <img src="{{asset('/')}}assets/imgs/sleeves.png" alt="">
                                    <h5>Sleeves</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam elit id nisl euismod varius. Morbi ut purus vel risus dapibus fermentum.</p>
                                </a>
                                </div>  
                                <!-- col-megamenu.// -->
                            </div>
                            <!-- end col-3 -->
                            <div class="col">
                                <div class="col-megamenu">
                                    <a href="#">
                                    <img src="{{asset('/')}}assets/imgs/anal-toys.png" alt="">
                                    <h5>Anal toys</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam elit id nisl euismod varius. Morbi ut purus vel risus dapibus fermentum.</p>
                                </a>
                                </div><!-- col-megamenu.// -->
                            </div><!-- end col-3 -->
                            <div class="col">
                                <div class="col-megamenu">
                                    <a href="#">
                                    <img src="{{asset('/')}}assets/imgs/dildos.png" alt="">
                                    <h5>Dildos</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam elit id nisl euismod varius. Morbi ut purus vel risus dapibus fermentum.</p>
                                </a>
                                </div>  <!-- col-megamenu.// -->
                            </div>    
                            <div class="col">
                                <div class="col-megamenu">
                                    <a href="#">
                                    <img src="{{asset('/')}}assets/imgs//vibrators.png" alt="">
                                    <h5>Vibrators</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam elit id nisl euismod varius. Morbi ut purus vel risus dapibus fermentum.</p>
                                </a>
                                </div>    <!-- col-megamenu.// -->
                            </div><!-- end col-3 -->
                            <div class="col">
                                <div class="col-megamenu">
                                    <a href="#">
                                    <img src="{{asset('/')}}assets/imgs/condom.png" alt="">
                                    <h5>Condum</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam elit id nisl euismod varius. Morbi ut purus vel risus dapibus fermentum.</p>
                                </a>
                                </div>    <!-- col-megamenu.// -->
                            </div><!-- end col-3 -->
                            <div class="col">
                                <div class="col-megamenu">
                                    <a href="#">
                                    <img src="{{asset('/')}}assets/imgs/condom.png" alt="">
                                    <h5>Condum</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras aliquam elit id nisl euismod varius. Morbi ut purus vel risus dapibus fermentum.</p>
                                </a>
                                </div>    <!-- col-megamenu.// -->
                            </div><!-- end col-3 -->
                        </div><!-- end row --> 
                    </div>
                </li>
                    <li class="nav-item"><a class="nav-link" href="#">Apps</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Possibilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
                </nav>
            </div>
            <div class="search-cart">
                <a href="#"><img src="assets/imgs/user.png"></a>
                <a href="#"><img src="assets/imgs/search.png"></a>
                <a class="cart" href="#"><img src="assets/imgs/cart.png"><span class="badge" style="color: black; background-color: #fc6ecb; border-radius: 100%; margin-left: -6px; z-index: 999 !important; padding: 0; height: 18px; width: 18px; line-height: 18px !important; position: absolute; font-size: 10px;" id="cartcount">0</span></a>
            </div>
        </div>
    </header>
    @yield('content')
<!-- //////////FOOTER/////////// -->
<footer>
    <div data-aos="fade-down" class="footer">
        <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <img class="logo-footer" width="100px" src="{{ ($generalsetting) ? asset('/uploads/logo/'.$generalsetting->logo) : null }}">
                    <ul class="contact-details">
                        <li>Email: {{ ($generalsetting) ? $generalsetting->email : null }}</li>
                        <li>Phone: {{ ($generalsetting) ? $generalsetting->phone : null }}</li>
                        <li>address: {{ ($generalsetting) ? $generalsetting->address : null }}</li>
                    </ul>
                </div>
                <div class="col-2">
                    <h4>MY ACCOUNT</h4>
                    <ul class="nav-links">
                        <li>My account </li>
                        <li>Wishlist </li>
                        <li>Specials </li>
                        <li>Order history </li>
                    </ul>
                </div>
                <div class="col-2">
                    <h4>MY ACCOUNT</h4>
                    <ul class="nav-links">
                        <li>My account </li>
                        <li>Wishlist </li>
                        <li>Specials </li>
                        <li>Order history </li>
    </ul>
                </div>
                <div class="col-2">
                    <h4>MY ACCOUNT</h4>
                    <ul class="nav-links">
                        <li>My account </li>
                        <li>Wishlist </li>
                        <li>Specials </li>
                        <li>Order history </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col"><p>{{ ($generalsetting) ? $generalsetting->copyright : null }}</p></div>
                    <div class="col">
                        <div class="social-media">
                            <ul>
                                <li><a href="{{ ($generalsetting) ? $generalsetting->facebook : null }}"><img src="assets/imgs/fb.png"></a></li>
                                <li><a href="{{ ($generalsetting) ? $generalsetting->instagram : null }}"><img src="assets/imgs/insta.png"></a></li>
                                <li><a href="{{ ($generalsetting) ? $generalsetting->twitter : null }}"><img src="assets/imgs/tt.png"></a></li>
                                <li><a href="{{ ($generalsetting) ? $generalsetting->youtube : null }}"><img src="assets/imgs/yt.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id='loader' style="display:none" >
  <img src='{{asset("/frontend/loader/loader.gif")}}' width='300px' height='300px'>
</div>
<!-- Image loader -->
<style>
    .menu-droplap {
    position: relative;
    height: 50px;
}
.menu-droplap .collapse.show {
    transition: 0.2s;
    width: 90%;
    position: absolute;
    background-color: #fff;
}
  #loader {
    align-items: center;
    display: flex;
    position: fixed;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    /* background-color: #ccc; */
    /* z-index: 9999; */
    padding-top: 10px;
    justify-content: center;
 }
</style>
    <!-- //////////FOOTER/////////// -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Toastr -->
<script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>
<script>
@if(session('success'))
  toastr.success("{{session('success')}}");
@endif
@if(session('error'))
  toastr.error("{{session('error')}}")
@endif
@if($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
@endif
</script>
    <!-- ///////////--STICKY HEADER--///////// -->
    <script>
        window.onscroll = function() {myFunction()};
        
        var header = document.getElementById("myheader");
        var sticky = header.offsetTop;
        
        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky-head");
          } else {
            header.classList.remove("sticky-head");
          }
        }
    </script>
    <!-- ///////////--AOS--///////// -->
        <script>
            AOS.init();
        </script>
      <!-- ///////////--AOS--///////// -->
      
      <!-- ///////////--IMAGER SLIDER--///////// -->
        <script>
            $('.imager-slider').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            adaptiveHeight: true,
            infinite: true,
            useTransform: true,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 400,
            });
        </script>
    <!-- ///////////--IMAGER SLIDER--///////// -->

    <!-- ///////////--PRODUCT SLIDER--///////// -->
    <script>
        $('.producter-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        });
    </script>
    <!-- ///////////--PRODUCT SLIDER--///////// -->

    <!-- ///////////--VIDEO_Carousel--///////// -->
    <script>
            $('.slider-single').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        speed: 400,
        cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
    });

    $('.slider-nav')
        .on('init', function(event, slick) {
            $('.slider-nav .slick-slide.slick-current').addClass('is-active');
        })
        .slick({
            slidesToShow: 7,
            slidesToScroll: 7,
            dots: false,
            arrows: false,
            focusOnSelect: false,
            infinite: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
            }, {
                breakpoint: 640,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            }, {
                breakpoint: 420,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
            }
            }]
        });

    $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
        $('.slider-nav').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.slider-nav .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });

    $('.slider-nav').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');

        $('.slider-single').slick('slickGoTo', goToSingleSlide);
    });
    </script>
    <!-- ///////////--HERO SLIDER--///////// -->
    <script type='text/javascript'>
        $('.banner-main').slick({
            dots: false,
            infinite: true,
            arrows:false,
            speed: 500,
            fade: true,
            cssEase: 'linear'
          });
    </script>
    <!-- ///////////--HERO SLIDER--///////// -->

    <!-- ///////////--VIDEO--///////// -->
    <script type='text/javascript'>
        document.getElementById('fullscreen-bg-video').addEventListener('ended', detectEnd, false);
    
        function detectEnd(e) {
            jQuery('.fullscreen-bg').fadeOut(500,function(){jQuery(this).remove();});
        }
    </script>
<!-- Cart script -->
<script>
    // Add Wishlist
    $(".add-wishlist").click(function(){
        var id = $(this).attr('data-id');
        // break;
        $.ajax({
            url: "{{route('addwishlist')}}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
            },
            success: function(data) {
                toastr.success(data.success);
                // Do stuff when the AJAX call returns
            }
        });
        // alert(id);
    });
    // Add cart
    $(".add-cart").click(function(){
        var id = $(this).attr('data-id');
        var price = $('#product_price-'+id).text();
        var quant = 1;
        var size = "0";
        var color = "0";
        // break;
        $.ajax({
            url: "{{route('addcart')}}",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                'price':price,
                'quant':quant,
                'size':size,
                'color':color
            },
            success: function(data) {
                cartfetch();
                toastr.success(data.success);
                // Do stuff when the AJAX call returns
            }
        });
        // alert(id);
    });

    $(document).ajaxStart(function(){
        // Show image container
        $("#loader").delay(3000).show();
    });
    $(document).ajaxComplete(function(){
        // Hide image container
        $("#loader").hide();
    });

    
    function cartfetch()
    {
        $.ajax({
            url: "{{route('cart.ajax')}}",
            type: "get",
            data: {},
            success: function(data) {
                $('#cartcount').text(data.carts);
                $('#subtotal').text(data.total);
                // toastr.success(data.success);
                // Do stuff when the AJAX call returns
            }
        });
    }
    cartfetch();

    // cart update
    function cartplus(id)
    {
        var price = $('#price-'+id).text();
        var oldquant = $('.quantity-val-'+id).val();
        var quant = Number(oldquant) + Number(1);
        if(quant > 1)
        {

            var t = price * quant;
            
            var total = $('#total-'+id).text(t);
            
            
            
            var type = 'plus';
            var product_id = $('.quantity-val-'+id).attr('data-product');
            
            $.ajax({
                url: "{{route('updatecart')}}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', id: id,quant:quant,type:type,product_id:product_id},
                success: function(data) {
                    toastr.success(data.success);
                    cartfetch();
                    // Do stuff when the AJAX call returns
                }
            });
        }
        // alert(id);
    }
    function cartminus(id)
    {
        var price = $('#price-'+id).text();
        var oldquant = $('.quantity-val-'+id).val();
        if(oldquant > 1)
        {
            var quant = Number(oldquant) - Number(1);
            var t = price * quant;
            
            var total = $('#total-'+id).text(t);
            
            
            
            var type = 'minus';
            var product_id = $('.quantity-val-'+id).attr('data-product');
            
            $.ajax({
                url: "{{route('updatecart')}}",
                type: "POST",
                data: {_token: '{{ csrf_token() }}', id: id,quant:quant,type:type,product_id:product_id},
                success: function(data) {
                    toastr.success(data.success);
                    cartfetch();
                    
                    // Do stuff when the AJAX call returns
                }
            });
        }
        // alert(id);
    }
    function removecart(id)
    {

        $.confirm({
            title: 'Confirm!',
            
            content: 'Are You Sure??!',
            buttons: {
                
                cancel: function () {
                    // $.alert('Canceled!');
                },
                somethingElse: {
                    text: 'confirm',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.ajax({
                            url: "{{route('deletecart')}}",
                            type: "get",
                            data: {id: id},
                            success: function(data) {
                                toastr.success(data.success);
                                $('#tr-'+id).closest("tr").hide();
                                cartfetch();
                            }
                        });
                    }
                }
            }
        });
    }
    </script>
</body>
</html>