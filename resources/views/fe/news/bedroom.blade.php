@extends('fe.layout.layout')

@section('contents')

<section class="shopping-cart spad" style="padding-top: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">


                <div id="comp-kcyf0tt5" class="BaOVQ8 tz5f0K comp-kcyf0tt5 wixui-rich-text" data-testid="richTextElement">
                    <h1 class="font_0 wixui-rich-text__text" style="line-height:1.3em; font-size:60px;">
                        <span style="letter-spacing:0.03em;" class="wixui-rich-text__text">BED ROOM</span>
                    </h1>
                </div>


                <div id="comp-kcymfd9y" class="BaOVQ8 tz5f0K comp-kcymfd9y wixui-rich-text" data-testid="richTextElement">
                    <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px; ">
                        <span style="letter-spacing:0.03em; font-style: italic;" class="wixui-rich-text__text">
                            <span style="letter-spacing:0.03em;" class="wixui-rich-text__text">
                                Waking up every morning energized on a soft mattress and a solid bed is all it takes
                                to beat a sluggish mood.</span>
                    </p>

                    <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px; ">
                        <span style="letter-spacing:0.03em; font-style: italic;" class="wixui-rich-text__text">
                            <span style="letter-spacing:0.03em;" class="wixui-rich-text__text">
                                Start the day more positively with clever arrangement of other bedroom furniture such as a bedside cabinet to store essentials,
                                a dressing table for radiant beauty or soft pillows colorful.</span>
                    </p>

                    <p class="font_8 wixui-rich-text__text" style="line-height:1.9em; font-size:16px; ">
                        <span style="letter-spacing:0.03em; font-style: italic;" class="wixui-rich-text__text">
                            <span style="letter-spacing:0.03em;" class="wixui-rich-text__text">
                                Shop today because we care about your sleep more than anyone else!</span>
                    </p>
                </div>

                <div class="row">
                    @foreach($products as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <div style="border: 2px solid black; padding-top: 5px;" class="product__item">
                    <div class="product__item__pic set-bg">
                        <img style="padding-left: 8px;" src="{{ asset('/images/'. $item->image) }}" alt="">
                        <span class="label">New</span>

                    </div>
                    <div class="product__item__text">

                        <h3><a style="margin-left: 20%; margin-top: -10%;" href="#" class="btn" data-pid="{{ $item->id }}">+ Add To Cart</a></h3>

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
                    <h6 style="margin-top: 17px; text-align: center;">
                        <p>{{ $item->price }} VND</p>
                    </h6>
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
