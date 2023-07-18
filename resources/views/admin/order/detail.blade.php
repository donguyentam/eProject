@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Order Cart</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('admin.order.index') }}">Orders</a></li>
            <li class="breadcrumb-item active">View Order Cart</li>
          </ol>
        </div>
        <div class="col-md-12">
                    <a class="btn btn-info float-right m-3" href="{{ Route('admin.editOrders', $orderId->id) }}">
                            <i class="fas fa-arrow-left">
                            </i>
                            Go Back
                        </a>
      </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
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
									<tr>
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
                                                    <img src="{{ asset('/images/'.$item->product->image) }}" alt="{{ $item->product->name }}" style="width:200px;height:auto" >
                                            </div>
                                        </td>
                                        <td>
                                        <div class="product__cart__item__text">
                                                <p style="color: #0d0d0d;
                                                font-weight: 700;">{{ $item->product->name }}</p>

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
						</div>

					</div>
					<!-- end main -->

				</div>
			</div>
		</div>
	</section>

  <!-- /.content -->
</div>

@endsection
