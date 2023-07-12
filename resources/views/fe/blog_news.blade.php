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
            @php 
                            $user = Sentinel::check();
                            @endphp
                                @if(Sentinel::check())
                                    
                                        <a style="color: white;font-size: xx-small;">Hello {{$user->email}}</a> 
                                        <a style="background-color: coral; padding: 3px;" href="{{'logout'}}">Log Out</a>
                                    
                                    
                               @else
                               <a href="{{ Route('login') }}">Sign in</a>
                               @endif
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
                                        <div class="select-total " style="color: #533c10;">
                                            <span style="color: #533c10;">total:</span>
                                            <h5 style="color: #533c10;">{{ number_format(Session::get("Cart")->totalPrice ) }} đ</h5>
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

    <section class="shopping-cart spad" style="padding-top: 20px;">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                   
                
                <div id="comp-kcyf0tt5" class="BaOVQ8 tz5f0K comp-kcyf0tt5 wixui-rich-text" data-testid="richTextElement">
                    <h1 class="font_0 wixui-rich-text__text" style="line-height:1.3em; font-size:60px;"><span style="letter-spacing:0.03em;" class="wixui-rich-text__text">HISTORY BEGIN</span></h1>
                </div>

                <div id="comp-kcynqza9" class="BaOVQ8 tz5f0K comp-kcynqza9 wixui-rich-text" data-testid="richTextElement">
                    <h2 class="font_5 wixui-rich-text__text" style="line-height:1.4em; font-size:27px;">
                <span style="letter-spacing:0.05em;" class="wixui-rich-text__text"><br class="wixui-rich-text__text"></span></h2>
                </div>

                <div id="comp-kcymfd9y" class="BaOVQ8 tz5f0K comp-kcymfd9y wixui-rich-text" data-testid="richTextElement">
                    <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px; ">
                    <span style="letter-spacing:0.03em; font-style: italic;" class="wixui-rich-text__text">
                        <span style="letter-spacing:0.03em;" class="wixui-rich-text__text">
                            Born from the idea of making a difference, Free Shop has maintained and developed into a leading position in the Vietnamese furniture market.</span></p>
    
                        <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px;">Up to now, Free Shop has had many large-scale and professional stores in big cities such as Hanoi, Ho Chi Minh City, and Binh Duong</span></p></div>
                        <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px;">With the desire to develop Vietnamese brand with internal resources, Free Shop has focused on domestic interior design and production. Free Shop's product portfolio is regularly renewed and updated, continuously providing customers with the latest trending product lines. Designed and manufactured by Vietnamese people, Free Shop brand furniture is always suitable for Asian life, providing perfect comfort in every living space.
                        </span></p>
                        <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px;">More than 70% of Free Shop's products are designed and manufactured by an elite team of employees and workers with a factory with the most modern facilities in Vietnam.</span></p>
                        <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px;">The quality of raw materials, accessories and production processes are all strictly inspected and monitored by the ISO 9001 quality management system. Free Shop's products are designed in the direction of usability and aesthetics. beauty and quality. In recent years, the brand has always focused on green design trends to contribute not only a comfortable living space but also a healthy living environment for users and the community. With such dedication, Free Shop is honored to be awarded the titles of "High Quality Vietnamese Goods", "Trusted brand" and "Top 100 Top Suppliers" for many years in a row.</span></p>
                        <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px;">Besides, Free Shop is proud to own a team of professional design consultants and engineers, with extensive knowledge in the field of furniture. The staff at Free Shop is committed to trying their best to advise and help customers choose the best product. The design consulting service of Free Shop will help customers create a desired living space through a skillful combination of interior products and decorations.</span></p>


                        <iframe
              class="map"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3193500366874!2d106.66408561462273!3d10.78683479231452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1669697060369!5m2!1svi!2s"
              width="600px"
              
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>

            <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px;">FPT Aptech HCM 1 - International Programmer Training System(Since 1999) 590 VND.Cach Mang Thang 8, Ward 11,District 3,Ho Chi Minh City 723564. If you need help, please contact us. Hotline: 035 9247 738 Thank You.</span></p>


                </div>
                <div class="col-lg-1">
                    
                </div>

                <div class="col-lg-5">
                    <img style="position: initial; max-width: 100%; margin-top: 10%;"  src="{{ asset('/fe/img/blog/blog-5.png') }}">
                    <img style="position: initial; max-width: 100%; margin-top: 10%;"  src="{{ asset('/fe/img/blog/blog-6.png') }}">
                    <img style="position: initial; max-width: 100%; margin-top: 10%; "  src="{{ asset('/fe/img/blog/blog-7.png') }}">
                </div>

                

            </div>
        </div>
    </section>

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
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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

    <script>
   function AddCart(id) {
        $.ajax({
            url:'AddCart/'+id,
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Added To Cart');
        });
    }

    $("#change-item-cart").on("click",".si-close i",function(){
        $.ajax({
            url:'DeleteItemCart/'+$(this).data("id"),
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            location.reload();
        });
    });

    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-cart").val());
        
    }
 </script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    </body>

</html>
   