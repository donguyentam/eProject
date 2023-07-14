@extends('fe.layout.layout')

@section('contents')
    <section class="shop spad" style="padding-top: 25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form type="get" action="{{ Route('itemSearch') }}">
                            <input type="text" name="search1" placeholder="Search..." style="border-color: black;">
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
                                            @if(isset($categories))
                                                @foreach($categories as $cates)
                                                    <li><a href="{{ Route('category',['id'=>$cates->id])}}">{{ ($cates->name) }}</a></li>
                                                @endforeach
                                            @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="middle">
                            <div id="multi_range">
                                <span id="left_value"></span>
                            </div>    
                            <div class="multi-range-slider my-2">

                                <div class="slider">
                                    <div class="track"></div>
                                    <div class="range"></div>
                                    <div class="thumb left"></div>
                                    <div class="thumb right"></div>
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
                            <div class="shop__product">
                                
                                <form style="margin-left: 30%;" action="{{ Route('productSearch') }}"   method="GET">
                                <p>Sort by Price:</p>
  <input required min="1" style="width: 30%;" type="number" name="min_price" placeholder="Minimum Price">
  <input required min="1" style="width: 30%;" type="number" name="max_price" placeholder="Maximum Price">
  <button class="btn5" style="padding-top: 3px;padding-bottom: 7px;" type="submit">Filter</button>
</form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                @if($products->count() >=1)
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
                                <a style="color: #0d0d0d; font-weight: 700;" href="{{ Route('productDetails', $item->id) }}">{{ $item->name }}</a>
                            </h4>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-md-12 my-5 text-center">
                        <h2> No Data</h2>
                    </div>
                @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            {{$products->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
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

    $('#sort_by').on('change', function(){
        let sort_by = $('#sort_by').val();
        
        // const url = "{{ Route('productSearch') }}";
        
        $.ajax({
            url: "{{ Route('sort_by') }}",
            method:"get",
            data:{sort_by:sort_by},
            success:function(res){
                $('fe.product_search').html(res);
            }
        });
    })

</script> 
@endsection
