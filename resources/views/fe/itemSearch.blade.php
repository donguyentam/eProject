@extends('fe.layout.layout')

@section('contents')

    <section class="shop spad" style="padding-top: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form type="get" action="{{ Route('itemSearch') }}">
                            <input type="text" name="itemSearch" placeholder="Search..." style="border-color: black;">
                            <button type="submit" value="itemSearch"><span class="icon_search"></span></button>
                        </form>

                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card" style="border-color: black;">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Type</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories" >
                                            <ul class="nice-scroll" style="border-color: black;">
                                                <li><a href="#">Table</a></li>
                                                <li><a href="#">Chair</a></li>
                                                <li><a href="#">Cabinet</a></li>
                                                <li><a href="#">Bed</a></li>
                                                <li><a href="#">Shelves</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $150.00</a></li>
                                                <li><a href="#">$150.00 - $200.00</a></li>
                                                <li><a href="#">$200.00 - $250.00</a></li>
                                                <li><a href="#">250.00+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <p class="pull-left">@forelse ($products as $products) sản phẩm</p>
                            @empty
                            <p>No products found</p>
                            @endforelse
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="1">Low To High</option>
                                    <option value="2">High to Low</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (isset($products))
                    @foreach($products as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                            <img src="{{ asset('/images/'. $item->image) }}" alt="">

                                <ul class="product__hover">
                                    <li><a href="#"><img src="{{ asset('/fe/img/icon/heart.png') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('/fe/img/icon/compare.png') }}" alt="">
                                            <span>Compare</span></a></li>
                                    <li><a href="#"><img src="{{ asset('/fe/img/icon/search.png') }}" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $item->price }} đ</h6>
                                <a onclick="AddCart({{$item->id}} )" href="javascript:" class="add-cart">+ Add To
                                    Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>

                            </div>
                            <h5>
                    <a href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a>
                  </h5>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <!-- Begin pagination !-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
