@extends('fe.layout.layout')
@section('contents')
<div class="inner-header">
	<div class="container">
		<div class="pull-left1">
			<h3 style="text-align: center ; " class="inner-title">ORDER HISTORY</h3>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
	<!-- main -->
	<section id="body">
		<div class="container mt-4">
			<div class="row">
				<div id="main" class="col-md-12">
					<div class="ta">


					</div>
					<div id="wrap-inner">

							<div style="text-align: center; margin-bottom: 5%;">
								<table class="table" style="background: white;" border="1" cellspacing="0">
									<tr>
											<th scope="col">First name</th>
											<th scope="col">Last name</th>
											<th scope="col">Address</th>
                                            <th scope="col">Number phone</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Payment method</th>
											<th scope="col">Order status</th><th scope="row"></th>
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
						</div>

					</div>
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@endsection


