@extends('fe.layout.layout')
@section('contents')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Confirmation</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('index')}}">Index</a> / <span>Confirm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="main" class="col-md-9">
					<div id="wrap-inner">
						<div id="complete">
							<p class="info">Order successful!</p>
                            <p>• Your order and contact information has been forwarded to the Email written in the order.</p>
                            <p>• We estimate your order will arrive at the specified address within 2-3 business days.</p>
                            <p>• The delivery person will contact you within 24 hours of order placement.</p>
                            <p>• Trụ sở chính: 391A Đ. Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Thành phố Hồ Chí Minh</p>
                            <p> Thank you for buying our product!</p>
						</div>
						<p class="text-right return"><a href="#">Back to home page</a></p>
					</div>
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@endsection
