@extends('fe.layout.layout')

@section('contents')
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
                        <!-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div> -->
                        <h3 style="color: #da5f5f!important;">{{ number_format($prod->price) }} đ <span>{{ number_format($prod->price) }} đ </span></h3>
                        <h4 class="font-weight-light">Current stock: {{ $prod->quantity }}</h4>
                        <p></p>

                        <div class="product__details__cart__option">
                            <div class="quantity">

                                <div class="pro-qty-2">
                                    <input style="width:57.2px" type="number" name="quanty" value="1" min="1" max="{{ $prod->quantity}}">
                                </div>
                            </div>
                            <a href="#" class="primary-btn" data-pid="{{ $prod->id }}">Add to Cart</a>
                        </div>

                        <div class="product__details__last__option">
                            <h5><a href="{{Route('checkout')}}" style=""><span>Checkout Now</span></a></h5>
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
                                    <p class="note">Wood Express is one of the leading companies in interior design and construction.
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
                                        <p>Wood Express always listens to and keeps up with the prevailing trends:
                                            Indochine style, Neo Classic neoclassical style,
                                            Modern modern style are subtly applied by Icon designers in each residential space but still bearing the unique imprint of the owner's personality.
                                            Customer satisfaction after each project is handed over is a certificate of achievement and tireless efforts of our staff.
                                            Wood Express Interior Design Joint Stock Company has gradually become a professional interior designer & constructor serving a series of projects of villas,
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
                <h3 class="related-title">Other Products</h3>
            </div>
        </div>
        <div class="row">
        @foreach($prodsd as $item)
          <div  class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
          <div class="card" style="background-color: antiquewhite;">
                        <a href="{{ Route('productDetails', $item->id) }}">
                            <img class="card-img-top" src="{{ asset('/images/'. $item->image) }}" alt="">
                        </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a style="color: #0d0d0d; font-weight: 700;" href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a>
                                        </h5>
                                        <h4 style="color: lightred;">{{ number_format($item->price) }} VNĐ</h4>
                                    <a class="add-cart primary-btn mt-3" style="color:white;" data-pid="{{ $item->id }}">Add To Cart</a>
                                    </div>
                            </div>
          </div>
        @endforeach
        </div>
    </div>
</section>
<!-- Related Section End -->


@endsection

@section('myjs')
<script>
    $('.product__details__cart__option a').click(function(e) {
        e.preventDefault(); // huỷ tác dụng thẻ a

        if(($('.product__details__cart__option .pro-qty-2 input').val()) == 0) {
            $i = null;
            $q = null;
            return false;
        }else {
            $i = $(this).data('pid');
            $q = $('.product__details__cart__option .pro-qty-2 input').val();
        }
        let pid = $i
        let quantity = $q;
        //alert(quantity);
        const url = "{{ Route('addCart') }}";
        $.ajax({
            url: url,
            method: 'post',
            data: {
                pid: pid,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                alertify.success('Added To Cart');
            }
        });
    });

    $('.product__item__text a').click(function(e) {
        e.preventDefault(); // huỷ tác dụng thẻ a
        let pid = $(this).data('pid');
        let quantity = 1;
        //alert(quantity);
        const url = "{{ Route('addCart') }}";
        $.ajax({
            url: url,
            method: 'post',
            data: {
                pid: pid,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                alertify.success('Added To Cart');
            }
        });
    });
</script>
@endsection
