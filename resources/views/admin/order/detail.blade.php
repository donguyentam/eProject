@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('admin.order.index') }}">Orders</a></li>
            <li class="breadcrumb-item active">View Order Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      @csrf
      @method('put')
      <!-- <input type="hidden" name="_method" value="put"/> -->
      <input type="hidden" name="id" value="{{ $orders->id }}"/>
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Order #{{ $orders->id }} Detail</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
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
						</div>
						<a class="btn btn-primary mb-2" href="{{Route('home')}}">Back to home page</a>
					</div>
            <p>Payment method?</p>
                <div class="form-group">

                          <div class="checkout__input__checkbox">
                              <label for="cod">
                                  COD
                                  <input type="radio" disabled name="payment_method" value="COD" id="cod">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
                          <div class="checkout__input__checkbox">
                              <label for="paypal">
                                  Paypal
                                  <input type="radio" disabled name="payment_method" value="Paypal" id="paypal">
                                  <span class="checkmark"></span>
                              </label>
                          </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-12">
        <input type="submit" value="Edit" class="btn btn-success float-right">
      </div>

  </section>
  <!-- /.content -->
</div>

@endsection
