<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">



    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('/fe/css/bootstrap1.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/nice-select1.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/fe/css/style5.css') }}" type="text/css">
</head>

<body style="background-color: wheat;">
    <!-- Page Preloder -->


    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                
            </div>
        </div>
        <div class="offcanvas__nav__option">
                <a style="text-decoration: none; color: black;" href="{{Route('viewCart')}}"><i class="icon_bag_alt"></i></a>
               
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee. Hotline:0359247738</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header" style="height: 140px;">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee. Hotline: 035 9247 738</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                            @php 
                            $user = Sentinel::check();
@endphp
                                @if(Sentinel::check())
                                    
                                        <a style="color: white;font-size: xx-small;">Hello {{$user->email}}</a> 
                                        <a style="background-color: coral; padding: 3px;" href="{{'logout'}}">Log Out</a>
                                    
                                    
                               
                               
                               @endif
                            </div>
                            <div class="header__top__hover">
                                <span>Usd <i class="arrow_carrot-down"></i></span>
                                <ul>
                                    <li>USD</li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="height:112px">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo" style="width: 110px; height: auto; padding: 5px;">
                        <a href="{{ Route('home') }}"><img src="{{ asset('/fe/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ Route('home') }}">Home</a></li>
                            <li><a href="{{ Route('productSearch') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                   
                                  
                                    <li><a href="{{ Route('viewCart') }}">Shopping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="{{ Route('blognews') }}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ Route('blognews') }}">Blog</a></li>
                
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <ul class="nav-right">
                            @if(!Sentinel::check())
                            <li><a style="padding:  4px 20px; background-color: wheat;border: 2px solid black; color: black; right: 10px; " href="{{ Route('login') }}">Sign in</a></li>
                            @endif
                            <li class="cart-icon">
                               
                                <a href="#">
<i class="icon_bag_alt"></i>
                                    @if(Session::has("Cart") != null)
                                    <span style="left: 14px;"
                                        id="total-quanty-show">{{Session::get("Cart")->totalQuanty}}</span>
                                    @else
                                    <span style="left: 14px;" id="total-quanty-show">0</span>
                                    @endif

                                </a>
                                <div class="cart-hover" style="top:40px;">
                                    <div id="change-item-cart">
                                        @if(Session::has("Cart") != null)


                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    @foreach(Session::get("Cart")->products as $item)
                                                    <tr>
                                                        <td class="si-pic" style="width: 90px"><img
                                                                src="{{ asset('/images/'. $item['productInfo']->image) }}"
                                                                alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p> {{ number_format ($item['productInfo'] -> price) }}
                                                                    đ x {{ $item['quanty'] }}</p>
                                                                <h6>{{ $item['productInfo']->name }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i class="fa fa-close"
                                                                data-id="{{ $item['productInfo']->id }}"></i>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>{{ number_format(Session::get("Cart")->totalPrice ) }} đ</h5>
                                        </div>

                                        @endif
                                    </div>

<div class="select-button">
                                        <a href="{{ Route('viewCart') }}" style="margin-right: 0px;"
                                            class="primary-btn view-card">VIEW
                                            CARD</a>
                                        
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="{{ Route('home') }}">Home</a>
                        <a href="javascript:void()">Shop</a>
                        <span>Product </span>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-lg-6 col-md-6">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="{{ asset('/images/' . $prod->image) }}" alt="">
                            </div>
                            <div style="padding-left: 0px;" class="col-lg-3 col-md-3">
                                
                            </div>

                        </div>

                        <div class="row d-flex justify-content-center">

                        </div>


                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        
                        <h4>{{ $prod->name }}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        <h3>{{ $prod->price }} đ <span>{{ $prod->price }} đ </span></h3>
                        <p></p>

                        <div class="product__details__cart__option">
                            <div class="quantity">
                                
                                <div class="pro-qty2">
                                    <input style="width:57.2px" type="number" name="quanty" value="1" min="1">
                                </div>
                            </div>      
                            <a onclick="AddCart({{$prod->id}} )" id="{{$prod->id}}" href="javascript:" class="primary-btn">+ Add To
                                    Cart</a>
                        </div>

                        <div class="product__details__last__option">
                            <h5><span><a href="{{Route('checkout')}}" style="">Checkout Now</a></span></h5>
                            <img src="img/shop-details/details-payment.png" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">

                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">Free Shop is one of the leading companies in interior design and construction.
                                        With enthusiasm, experience, enthusiasm and cosmetics,
                                        the Home&Home team confidently brings customers the appraised interior styles,
                                        enhancing the value of your home. With us, you will surely be satisfied with your living space.</p>
                                    <div class="product__details__tab__content__item">
                                        <h5>What is Interior Design?</h5>
<p>When it comes to interior design, many people are not clear about this concept.
                                            Interior design is understood as the harmonious coordination between objects, colors, lighting, decorations,
                                            architectural aesthetics and spiritual and feng shui elements to create a comfortable living environment for you.
                                            , convenient.</p>
                                        <p>Referring to interior design is referring to the synthesis of the whole sky of art, fine arts and science and technology.
                                            It can be said that interior design is a prerequisite in the construction of today's buildings.
                                            Typically, modern interior architecture emphasizes the harmonious arrangement of simple spatial shapes.</p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>SERVICE</h5>
                                        <p>Free Shop always listens to and keeps up with the prevailing trends:
                                            Indochine style, Neo Classic neoclassical style,
                                            Modern modern style are subtly applied by Icon designers in each residential space but still bearing the unique imprint of the owner's personality.
                                            Customer satisfaction after each project is handed over is a certificate of achievement and tireless efforts of our staff.
                                            Free Shop Interior Design Joint Stock Company has gradually become a professional interior designer & constructor serving a series of projects of villas,
                                            townhouses, apartments, offices, restaurants, hotels, etc. resort…</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach($prodsd as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('/images/'. $item->image) }}">
                    </div>
                   
                    <div class="product__item__text" style="padding-top: 40px;">
                        
<a onclick="AddCart({{$item->id}} )" href="javascript:" class="add-cart">+ Add To
                                    Cart</a>
                        <div class="rating">
                             
                        </div>
                        
                        <h5>{{ $item->price }} đ</h5>

                    </div>
                    <h6 style="color:black;"><a style="color:black;" href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a></h6>
                </div>
</div>
                @endforeach
        </div>
    </div>
</section>
<!-- Related Section End -->
 <!-- Footer Section Begin -->
 <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="img/footer-logo.png" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which includes design.</p>
                    <a href="#"><img src="img/payment.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Clothing Store</a></li>
                        <li><a href="#">Trending Shoes</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Sale</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Shopping</h6>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Delivary</a></li>
                        <li><a href="#">Return & Exchanges</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>NewLetter</h6>
                    <div class="footer__newslatter">
                        <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit"><span class="icon_mail_alt"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>2020
                        All rights reserved
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{ asset('/fe/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/fe/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/fe/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('/fe/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('/fe/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/fe/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('/fe/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('/fe/js/mixitup.min.js') }}"></script>
<script src="{{ asset('/fe/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/fe/js/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

<script>
    function AddCart(id) {
        $.ajax({
            url:'AddCart2/'+id,
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Them vao thanh cong');
        });
    }

    $("#change-item-cart").on("click",".si-close i",function(){
        $.ajax({
            url:'DeleteItemCart/'+$(this).data("id"),
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Xoa thanh cong');
            location.reload();
        });
    });

    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-cart").val());
        
    }
</script>

</body>

</html>
<!-- Shopping Cart Section Begin -->