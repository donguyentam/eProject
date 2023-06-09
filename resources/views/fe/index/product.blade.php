<section class="product spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <ul class="filter__controls">
                  <li class="active" data-filter="*">Best Sellers</li>
                  <li data-filter=".new-arrivals">New Arrivals</li>
                  <li data-filter=".hot-sales">Hot Sales</li>
              </ul>
          </div>
      </div>
      <div class="row product__filter">
        @foreach($prods as $item)
          <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
              <div class="product__item">
                  <div class="product__item__pic set-bg" data-setbg="{{ asset('/images/'.$item->image) }}">
                      <!-- <span class="label">New</span> -->
                      <ul class="product__hover">
                          <li><a href="#"><img src="{{ asset('/fe/img/icon/heart.png') }}" alt=""></a></li>
                          <li><a href="#"><img src="{{ asset('/fe/img/icon/compare.png') }}" alt=""> <span>Compare</span></a></li>
                          <li><a href="#"><img src="{{ asset('/fe/img/icon/search.png') }}" alt=""></a></li>
                      </ul>
                  </div>
                  <div class="product__item__text">
                      <h6>{{ $item->price }} đ</h6>
                      <a href="#" class="add-cart" data-pid="{{ $item->id }}">+ Add To Cart</a>
                      <div class="rating">
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                      </div>
                      <!-- <div class="product__color__select">
                          <label for="pc-1">
                              <input type="radio" id="pc-1">
                          </label>
                          <label class="active black" for="pc-2">
                              <input type="radio" id="pc-2">
                          </label>
                          <label class="grey" for="pc-3">
                              <input type="radio" id="pc-3">
                          </label>
                      </div> -->
                  </div>
                  <h5>
                    <a href="{{ Route('productDetails', $item->slug) }}">{{ $item->name }}</a>
                  </h5>
              </div>
          </div>
        @endforeach
      </div>
  </div>
</section>