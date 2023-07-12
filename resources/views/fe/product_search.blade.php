@extends('fe.layout.layout')

@section('contents')
    <section class="shop spad" style="padding-top: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form type="get" action="{{ Route('itemSearch') }}">
                            <input type="text" name="search" placeholder="Search..." style="border-color: black;">
                            <button type="submit" value="Search"><span class="icon_search"></span></button>
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
                    @foreach($products as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg">
                                <img src="{{ asset('/images/'. $item->image) }}" alt="">

                            </div>
                            <div class="product__item__text">
                                <h6>{{ $item->price }} VNĐ</h6>
                                <a href="#" class="add-cart" data-pid="{{ $item->id }}">+ Add To Cart</a>


                            </div>
                            <h4>
                    <a style="color: #0d0d0d;
    font-weight: 700;" href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a>
                  </h4>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">9</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>


@endsection
@section('myjs')
<script>
    $('.product__item__text a').click(function(e) {
        e.preventDefault(); // huỷ tác dụng thẻ a
        let pid = $(this).data('pid');
        let quantity = 1;
        //alert(quantity);
        const url = "{{ Route('addCart') }}";
        $.ajax({
            url: url,
            method: 'post',
            data: {
                pid: pid,
                quantity: quantity,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                alertify.success('Added To Cart');
            }
        });
    });
</script> 
@endsection
