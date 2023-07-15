<section class="product spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <ul class="filter__controls">
                  <li class="active" data-filter="*">New Product</li>
                  
              </ul>
          </div>
      </div>


      <div style="display: flex;" class="ro product__filte">
      @foreach($prodsd as $item)
          <div style="border: 2px solid black; padding-top: 5px; margin-left: 1%;" class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
              <div class="product__item">
                  <div class="product__item__pic set-bg" >
                    <img src="{{ asset('/images/'. $item->image) }}" alt="">
                      <span class="label">New</span>
                      
                  </div>
                  <div class="product__item__text">
                      <h5><p>{{ $item->price }} đ</p></h5>
                      <h3><a href="#" class="add-cart" data-pid="{{ $item->id }}">+ Add To Cart</a></h3>
                     
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
                    <a href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a>
                  </h5>
              </div>
          </div>
        @endforeach
      </div>
  </div>
</section>


