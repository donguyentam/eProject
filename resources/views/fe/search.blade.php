@extends('fe.layout.layout')

@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Tìm kiếm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($product as $prods)
							<div class="col-sm-3">
								<div class="single-item">
									<!-- @if($prods->product_promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif -->
									<div class="single-item-header">
										<a href="{{route('detailproduct',$prods->id)}}"><img width="300" height="250" src="upload/product/{{$prods->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title1">{{$prods->name}}</p>
										<p class="single-item-price" style="font-size: 18px">
											<!-- @if($prods->product_promotion_price == 0)
											<span class="flash-sale">{{number_format($prods->price)}} đồng</span>
											@else -->
											<span class="flash-del">{{number_format($prods->price)}} đồng</span>
											<span class="flash-sale">{{number_format($prods->price)}} đồng</span>
											<!-- @endif -->
										</p>
									</div>
									<?php
										// $array_size = explode(',', $prods->product_size);
										// $array_color = explode(',', $prods->product_color);
									?>
									<div class="single-item-caption">
										<!-- <a class="add-to-cart pull-left" href="{{route('AddCart',$prods->id)}}" size="{{ $array_size[0] !== "" ? $array_size[0] : 'Size'}}" 
										color="{{ $array_color[0] !== "" ? $array_color[0] : 'Color' }}" qtyCart="
										{{ Cart::count() > 0 ? Cart::count() : 0}}" max="{{$prods->quantity}}"><i class="fa fa-shopping-cart"></i></a> -->
										<a onclick="AddCart({{$prods->id}} )" href="javascript:" class="add-cart">+ Add To Cart</a>
										<a class="beta-btn primary" href="{{route('detailproduct',$prods->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection