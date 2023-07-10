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
                        <span>Product Details</span>
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
                  <ul class="nav nav-tabs" role="tablist">
                      <li style="display: inline-flex;"  class="nav-item">
                          <a style="margin-right: 5px;" class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                              <div class="product__thumb__pic set-bg" data-setbg="{{ asset('/images/' . $prod->image) }}">
                                
                              </div>
                          </a>

                          <a style="margin-right: 5px;" class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                              <div class="product__thumb__pic set-bg" data-setbg="{{ asset('/images/' . $prod->image) }}">
                                
                              </div>
                          </a>

                          <a style="margin-right: 5px;" class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                              <div class="product__thumb__pic set-bg" data-setbg="{{ asset('/images/' . $prod->image) }}">
                                
                              </div>
                          </a>

                         


                      </li>
                  </ul>
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
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="#" class="primary-btn" data-pid="{{ $prod->id }}">add to cart</a>
                        </div>

                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('/fe/img/blog/details/details-1.png') }}">
                        <span class="label">New</span>

                    </div>
                    <div class="product__item__text">
                        <h6>Sports style study table and chair</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>50.000.000</h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('/fe/img/blog/details/details-2.png') }}">

                    </div>
                    <div class="product__item__text">
                        <h6>Luxury style coffee table and chairs</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>10.000.000</h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item sale">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('/fe/img/blog/details/details-3.png') }}">
                        <span class="label">Sale</span>

                    </div>
                    <div class="product__item__text">
                        <h6>Classic desk and chair</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>20.000.000</h5>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{ asset('/fe/img/blog/details/details-4.png') }}">

                    </div>
                    <div class="product__item__text">
                        <h6>Luxury living room furniture</h6>
                        <a href="#" class="add-cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>100.000.000</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Section End -->
@endsection

@section('myjs')

@endsection