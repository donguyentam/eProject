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

                      <h6 class="checkout__title">Billing Details</h6>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>First Name <span>*</span></p>
                                  <input type="text" name="first_name" required value="{{ isset($user->first_name) ? $user->first_name: '' }}">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Last Name <span>*</span></p>
                                  <input type="text" required name="last_name" value="{{ isset($user->last_name) ? $user->last_name: '' }}">
                              </div>
                          </div>
                      </div>

                      <div class="checkout__input">
                          <p>Address <span>*</span></p>
                          <input type="text" name="address" value="{{ isset($user->address) ? $user->address: '' }}" required placeholder="Street Address" class="checkout__input__add">
                      </div>

                      <div class="row">
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Phone <span>*</span></p>
                                  <input type="tel" maxlength="15" value="{{ isset($user->phone_number) ? $user->phone_number: '' }}" required name="phone_number">
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="checkout__input">
                                  <p>Email<span>*</span></p>
                                  <input type="text" required name="email" value="{{ isset($user->email) ? $user->email: '' }}">
                              </div>
                          </div>
                      </div>
                      <div class="checkout__input">
                          <p>Order notes</p>
                          <input type="text" name="note"
                          placeholder="Notes about your order, e.g. special notes for delivery.">
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 align-bottom">
                      <div class="checkout__order align-items-end justify-content-end">
                          <h4 style="margin-bottom: 0px;" class="order__title">Your order</h4>


                          @php
                            $totalP=0;
                            $totalQ=0;
                            @endphp

                          @if(!empty(session('cart')))
                          @foreach(Session::get('cart') as $item)
                          @php
                          $totalQ+=$item->quantity;
                          $totalP+=$item->product->price * $item->quantity;
                            @endphp
                          @endforeach

                          <ul class="checkout__total__all">
                          <li>Total Quantity: <span>{{ $totalQ }} </span></li>
                                    <li>Total Price: <span style="color: green";>{{ number_format($totalP) }} VNĐ</span></li>
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
                                  <input type="radio" name="payment_method" value="COD" id="cod" required>
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="checkout__input__checkbox">
                              <label for="paypal">
                                  Paypal
                                  <input type="radio" name="payment_method" value="Paypal" id="paypal" required>
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          @if(empty(session('cart')))
    <button disabled class="site-btn">NO ITEMS IN CART</button>
@else
    <button type="submit" class="site-btn">PLACE ORDER</button>
@endif



                      </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
</section>
<!-- Checkout Section End -->
@endsection
