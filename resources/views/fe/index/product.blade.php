<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Latest Products</li>

                </ul>
            </div>
        </div>


        <div class="row product__filte">
            @foreach($prodsd as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
            <div class="card" style="background-color: antiquewhite;">
                        <a href="{{ Route('productDetails', $item->id) }}">
                            <img class="card-img-top" src="{{ asset('/images/'. $item->image) }}" alt="">
</a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a style="color: #0d0d0d; font-weight: 700;" href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a>
                                        </h5>
                                        <h4 style="color: lightred;">{{ number_format($item->price) }} VNĐ</h4>
                                    <a class="add-cart primary-btn mt-3" href="#" style="color:white;" data-pid="{{ $item->id }}">Add To Cart</a>
                                    </div>
                            </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
