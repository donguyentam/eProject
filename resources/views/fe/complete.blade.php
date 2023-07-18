@extends('fe.layout.layout')
@section('contents')
<div class="inner-header">
	<div class="container">
		<div class="pull-left1">
			<h3 style="text-align: center;" class="inner-title">Confirmation</h3>
			<h5 style="text-align: center;" class="info mt-3">Order successful!</h5>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	<!-- main -->
	<section id="body ">
		<div class="container mt-3">
			<div class="row">
				<div id="main" class="col-md-12">
					<div class="ta">


					</div>
					<div id="wrap-inner">
						<div id="complete">


						@php
						$total =0
					@endphp
							<div style="text-align: center; margin-left: auto; margin-bottom: 5%;">
								<table class="table" style="background: white;" border="1" cellspacing="0" >
									<tr style="background-color:rgb(255, 245, 226);">
                                    <th scope="col">Product Image</th>

											<th scope="col"><strong>Product Name</strong></th>
											<th scope="col"><strong>Price</strong></th>
											<th scope="col"><strong>Quantity</strong></th>
											<th scope="col"><strong>Total</strong></th>
										</tr>
									@foreach($orderd as $item)
									@if ($item -> quantity > 0)
										<tr scope="row">
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <a href="{{ Route('productDetails', $item->product->id) }}">
                                                    <img src="{{ asset('/images/'.$item->product->image) }}" alt="{{ $item->product->name }}" style="width:200px;height:auto" >
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="product__cart__item__text">
                                                <a style="color: #0d0d0d;
                                                font-weight: 700;" href="{{ Route('productDetails', $item->product->id) }}">{{ $item->product->name }}</a>

                                            </div>
                                        </td>
											<td>{{number_format($item-> product->price)}} VNĐ</td>
											<td>{{$item->quantity}}</td>
											<td>{{number_format( $item-> product->price*$item->quantity,0,',','.')}}</td>
										</tr>
										@php
											$total += $item-> product->price*$item->quantity;
										@endphp
										@endif
										@endforeach
										<tr>
											<td>Total:</td>
											<td colspan="4" align="right" ><h4 style="color:green;">{{ number_format($total)}} VNĐ</h4></td>
										</tr>
									</table>
							</div>





							<div style="text-align: center;">
								<p>• Your order and contact information has been forwarded to the Email written in the order.</p>
                            <p>• We estimate your order will arrive at the specified address within 2-3 business days.</p>
                            <p>• The delivery person will contact you within 24 hours of order placement.</p>
                            <p>• Main HQ: 391A Đ. Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Thành phố Hồ Chí Minh</p>
                            <p> Thank you for buying our product!</p>
							</div>

						</div>

					</div>
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@endsection
