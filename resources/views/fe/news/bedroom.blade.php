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
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals mt-3">
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
