
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
@if(Session::has("Cart") != null)

<div class="select-items">
    <table>
        <tbody>
            @foreach(Session::get('Cart')->products as $item) 
            <tr>
                <td class="si-pic" style="width: 90px"><img src="{{ asset('/images/'. $item['productInfo']->image) }}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p> {{ number_format ($item['productInfo'] -> price) }} đ x {{ $item['quanty'] }}</p>
                        <h6>{{ $item['productInfo']->name }}</h6>
                    </div>
                </td>
                <td class="si-close">
                <i class="fa fa-close" data-id="{{ $item['productInfo']->id }}"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>{{ number_format(Session::get('Cart')->totalPrice ) }} đ</h5>
    <input hidden id="total-quanty-cart" type="text" value="{{Session::get('Cart')->totalQuanty}}">
</div>

@endif