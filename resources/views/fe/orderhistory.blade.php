@extends('fe.layout.layout')
@section('contents')
<div class="inner-header">
	<div class="container">
		<div class="pull-left1">
			<a class="btn btn-primary mb-2" href="{{Route('home')}}">Back to home page</a>
			<h3 style="text-align: center ; " class="inner-title">History Order</h3>
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="main" class="col-md-12">
					<div class="ta">


					</div>
					<div id="wrap-inner">
						
							<div style="text-align: center; margin-left: 15%; margin-bottom: 5%;">
								<table border="1" cellspacing="0">
									<tr>
											<th >First name</th>
											<th >Last name</th>
											<th >Address</th>
                                            <th >Number phone</th>
                                            <th >Email</th>
                                            <th >Note</th>
                                            <th >Payment method</th>
											<th >Order status</th>
										</tr>
									@foreach($order as $item)
										<tr>
											<td>{{$item->first_name}}</td>
											<td>{{$item->last_name}}</td>
											<td>{{$item->address}}</td>
											<td>{{$item->phone_number}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->note}}</td>
                                            <td>{{$item->payment_method}}</td>
                                            <td>{{$item->order_status}}</td>
										</tr>
                                        @endforeach
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


