@extends('fe.layout.layout')
@section('contents')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Confirmation</h6>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="main" class="col-md-9">
					<div class="ta">


					</div>
					<div id="wrap-inner">
						<div id="complete">
							<p class="info">Order successful!</p>
							@foreach($order as $item)
						<div><h5>Customer Name: {{$item->first_name}} {{$item->last_name}}</h5> </div><br>
						<div><h5>Email: {{$item->email}}</h5> </div><br>
						<div><h5>Phone Number: {{$item->phone_number}}</h5> </div><br>
						<div><h5>Address: {{$item->address}}</h5> </div><br>
						<div><h5>Note: {{$item->note}}</h5> </div><br>
						@endforeach
						@php
						$total =0
					@endphp

						<table border="1" cellspacing="0">
							<tr>
									<td><strong>Product name</strong></td>
									<td><strong>Price</strong></td>
									<td><strong>Quantity</strong></td>
									<td><strong>Total</strong></td>
								</tr>
								@foreach($order as $item)
								<tr>
									<td>{{$item-> product->name}}</td>
									<td>{{number_format($item-> product->price)}} VNĐ</td>
									<td>{{$item->quantity}}</td>
									<td>{{number_format($item-> product->price*$item->quantity,0,',','.')}}</td>
								</tr>
								@php
									$total += $item->product->price * $item->quantity;
								@endphp
								@endforeach

								<tr>
									<td>Total:</td>
									<td colspan="3" align="right">{{ number_format( $total )}} VNĐ</td>
								</tr>
							</table>


                            <p>• Your order and contact information has been forwarded to the Email written in the order.</p>
                            <p>• We estimate your order will arrive at the specified address within 2-3 business days.</p>
                            <p>• The delivery person will contact you within 24 hours of order placement.</p>
                            <p>• Main HQ: 391A Đ. Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Thành phố Hồ Chí Minh</p>
                            <p> Thank you for buying our product!</p>
						</div>
						<a class="btn btn-primary mb-2" href="{{Route('home')}}">Back to home page</a>
					</div>
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@endsection
