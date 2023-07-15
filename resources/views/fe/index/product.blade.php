<section class="product spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <ul class="filter__controls">
                  <li class="active" data-filter="*">New Product</li>
                  
              </ul>
          </div>
      </div>


      <div  class="row product__filte">
      @foreach($prodsd as $item)
          <div  class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
              <div style="border: 2px solid black; padding-top: 5px;" class="product__item">
                  <div class="product__item__pic set-bg" >
                    <img style="padding-left: 8px;" src="{{ asset('/images/'. $item->image) }}" alt="">
                      <span class="label">New</span>
                      
                  </div>
                  <div class="product__item__text">
                     
                      <h3><a  style="margin-left: 30%;" href="#" class="add-cart" data-pid="{{ $item->id }}">+ Add To Cart</a></h3>
                     
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
                  <h6 style="margin-top: 17px; text-align: center;"><p>{{ $item->price }} VND</p></h6>
                  <div>
                    <h5 style="text-align: center; margin-bottom: 15px;">
                    <a style="color: black;" href="{{ Route('productDetails', $item->id) }}"><b>{{ $item->name }}</b></a>
                  </h5>  
                  </div>
                  
              </div>
          </div>
        @endforeach
      </div>
  </div>
</section>


