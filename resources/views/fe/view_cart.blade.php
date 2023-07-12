@extends('fe.layout.layout')

@section('contents')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="breadcrumb__text">
                  <h4>Shopping Cart</h4>
                  <div class="breadcrumb__links">
                      <a href="{{ Route('home') }}">Home</a>
                      <a href="{{ Route('productSearch') }}">Shop</a>
                      <span>Shopping Cart</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <tr style="background-color:rgb(255, 245, 226);">
                                    <th style="padding-left: 21px;padding-bottom: 10px; padding-top: 10px;">Product</th>
                                    <th style="padding-bottom: 3px; ">Quantity</th>
                                    <th style="padding-bottom: 3px; text-align: center;">Total</th>
                                    <th style="padding-bottom: 3px; text-align: center;">Delete</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                          $totalQ=0;
                          $totalP=0;
                          @endphp

                          @if (\Session::has('cart'))
                            @foreach(\Session::get('cart') as $item)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="{{ asset('/images/'.$item->product->image) }}" alt="{{ $item->product->name }}" style="width:200px;height:auto">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6 style="color: #0d0d0d;
                                        font-weight: 700;">{{ $item->product->name }}</h6>
                                        
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="{{ $item->quantity }}" data-pid="{{ $item->product->id }}">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">{{ $item->product->price * $item->quantity }} đ</td>
                                @php
                                $totalQ+=$item->quantity;
                                $totalP+=$item->product->price * $item->quantity;

                                @endphp
                                <td style="text-align: center;" class="cart__close"><a href="#"  data-pid="{{ $item->product->id }}"><i class="fa fa-close"></i></a></td>
                            </tr>
                            @endforeach
                          @endif  
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a style="background-color: #724100; color: white;" href="{{ Route('productSearch') }}">Continue
                                Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            @if(\Session::has('cart'))
                        <div style="margin-top: 10px;" class="col-lg-4 offset-lg-8">
                            <div class="cart__total">
                                <ul>
                                    <li>Total Quantity <span>{{ $totalQ }} </span></li>
                                    <li>Total Price <span>{{ $totalP }} đ</span></li>
                                </ul>
                                @php
                            $user = Sentinel::check();
                            @endphp
                                @if(Sentinel::check())

                                <a href="{{ Route('checkout') }}" class="primary-btn">Proceed to checkout</a>



                               @else
                               <a href="{{ Route('login') }}" class="primary-btn">Sign in to checkout</a>
                               @endif

                            </div>
                        </div>
            @endif
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection

@section('myjs')
<script>
$('.continue__btn.update__btn').click(function(e) {
  e.preventDefault();
  let pids=[];
  let quantities=[];
  $('.pro-qty-2 input[type="text"]').each(function(index, value){
    pids.push($(value).data('pid'));
    quantities.push($(value).val());
  });
  const url = "{{ Route('updateCart') }}";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            pids: pids,
            quantities: quantities,
            _token: "{{ csrf_token() }}"
        },
        success: function(data) {
            location.reload();  // reload lại trang
        }
    });
});

$('.cart__close a').click(function(e) {
    e.preventDefault();
    const pid = $(this).data('pid');

    const url = "{{ Route('removeCartItem') }}";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            pid: pid,
            _token: "{{ csrf_token() }}"
        },
        success: function(data) {
            location.reload();  // reload lại trang
        }
    });
});
</script>

@endsection