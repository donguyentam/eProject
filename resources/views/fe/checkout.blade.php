@extends('fe.layout.layout')

@section('contents')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="breadcrumb__text">
                  <h4>Check Out</h4>
                  <div class="breadcrumb__links">
                      <a href="{{ Route('home') }}">Home</a>
                      <a href="javascript:void(0)">Shop</a>
                      <span>Check Out</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
      <div class="checkout__form">
          <form action="{{ Route('saveCart') }}" method="post">
              @csrf
              <input type="hidden" name="uid" value="{{ $user->id}}"/>
              <div class="row">
                  <div class="col-lg-8 col-md-6">
                      <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                      here</a> to enter your code</h6>
                      <h6 class="checkout__title">Billing Details</h6>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>First Name<span>*</span></p>
                                  <input type="text" name="first_name" value="{{ isset($user->firstname) ? $user->firstname: '' }}">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Last Name<span>*</span></p>
                                  <input type="text" name="last_name">
                              </div>
                          </div>
                      </div>
                      
                      <div class="checkout__input">
                          <p>Address<span>*</span></p>
                          <input type="text" name="address" placeholder="Street Address" class="checkout__input__add">
                      </div>
                      
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Phone<span>*</span></p>
                                  <input type="text" name="phone_number">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Email<span>*</span></p>
                                  <input type="text" name="email" value="{{ isset($user->email) ? $user->email: '' }}">
                              </div>
                          </div>
                      </div>
                      
                      <div class="checkout__input__checkbox">
                          <label for="diff-acc">
                              Note about your order, e.g, special note for delivery
                              <input type="checkbox" id="diff-acc">
                              <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="checkout__input">
                          <p>Order notes</p>
                          <input type="text" name="note"
                          placeholder="Notes about your order, e.g. special notes for delivery.">
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                      <div class="checkout__order">
                          <h4 style="margin-bottom: 0px;" class="order__title">Your order</h4>
                          
                          
                          @php
                            $totalP=0;
                            $totalQ=0;
                            @endphp
                          
                          @if(Session::has("Cart") != null)
                          @foreach(Session::get('Cart')->products as $item)
                          @php
                            $totalP+=($item['productInfo'] -> price) * ($item['quanty']);
                            $totalQ=Session::get('Cart')->totalQuanty;
                            @endphp
                          @endforeach
                          
                          <ul class="checkout__total__all">
                          <li>Total Quantity: <span>{{ $totalQ }} </span></li>
                                    <li>Total Price: <span>{{ $totalP }} đ</span></li>
                          </ul>
                          <input type="hidden" name="total" value="{{ $totalP }}" class="checkout__input__add">
                          @endif

                          <!-- <div class="checkout__input__checkbox">
                              <label for="acc-or">
                                  Create an account?
                                  <input type="checkbox" id="acc-or">
                                  <span class="checkmark"></span>
                              </label>
                          </div> -->
                          <p>Payment method?</p>
                          <div class="checkout__input__checkbox">
                              <label for="cod">
                                  COD
                                  <input type="radio" name="payment_method" value="COD" id="cod">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="checkout__input__checkbox">
                              <label for="paypal">
                                  Paypal
                                  <input type="radio" name="payment_method" value="Paypal" id="paypal">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <button type="submit" class="site-btn">PLACE ORDER</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
</section>
<!-- Checkout Section End -->
@endsection