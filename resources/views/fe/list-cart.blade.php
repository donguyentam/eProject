
<div  class="col-lg-8" style="padding-left: 0px;">
                        <div class="cart__discount" style="margin-bottom: 40px;">
                            <h6 style="margin-bottom: 10px;">Discount codes</h6>
                            <div>
                                <form action="#" style="text-align: center;">
                                <input style="height: 30px;"  type="text" placeholder="Coupon code">
                                <button style="height: 30px;" type="submit">Apply</button>
                            </form>
                        </div>
                            
                        </div>
                    </div>
                    <div class="shopping__cart__table">
                        <table style="ba">
                            <thead>
                                <tr style="background-color:rgb(255, 245, 226);">
                                    <th style="padding-left: 21px;padding-bottom: 10px; padding-top: 10px;">Product</th>
                                    <th style="padding-bottom: 3px; ">Quantity</th>
                                    <th style="padding-bottom: 3px; text-align: center;">Total</th>
                                    <th style="padding-bottom: 3px; text-align: center;">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalP=0;
                                $totalQ=0;
                                @endphp

                                @if(Session::has("Cart") != null)
                                @foreach(Session::get('Cart')->products as $item)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset('/images/'. $item['productInfo']->image) }}" alt=""
                                                style="width:200px;height:auto">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $item['productInfo']->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input  type="text" data-id="{{ $item['productInfo']->id }}" id="quanty-item-{{ $item['productInfo']->id }}"
                                                    value="{{ $item['quanty'] }}">
                                            </div>

                                        </div>
                                    </td>
                                    <td  style="text-align: center;" class="cart__price">{{($item['productInfo'] -> price) * ($item['quanty'])}}</td>
                                    @php
                                    $totalP+=($item['productInfo'] -> price) * ($item['quanty']);
                                    $totalQ=Session::get('Cart')->totalQuanty;
                                    @endphp
                                    <td class="cart__close"  style="text-align: center;">
                                        <i style="margin-right: 14px;" class="fa fa-refresh"
                                            onclick="SaveListItemCart({{$item['productInfo']->id}});"></i>

                                        <i class="fa fa-close"
                                            onclick="DeleteListItemCart({{$item['productInfo']->id}});"></i>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ Route('home') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner edit-all"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            
                        </div>
                        @if(Session::has("Cart") != null)
                        <div class="col-lg-4 offset-lg-4">
                            <div class="cart__total">
                                <ul>
                                    <li>Total Quantity: <span>{{ $totalQ }} </span></li>
                                    <li>Total Price: <span>{{ $totalP }} đ</span></li>
                                </ul>
                                <a href="{{ Route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                            </div>
                        </div>
                        @endif
                    </div>