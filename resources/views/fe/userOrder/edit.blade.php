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
            <li class="breadcrumb-item active">Edit Order</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="{{ Route('admin.order.update', $orders->id) }}" class="row" method="post"
                        enctype="multipart/form-data">
      @csrf
      @method('put')
      <!-- <input type="hidden" name="_method" value="put"/> -->
      <input type="hidden" name="id" value="{{ $orders->id }}"/>
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Order Information</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="first_name">First name</label>
              <input id="first_name" disabled class="form-control" name="first_name" value="{{ $orders->first_name }}"/>
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input id="last_name" disabled class="form-control" name="last_name" value="{{ $orders->last_name }}"/>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input id="address" disabled class="form-control" name="address" value="{{ $orders->address }}"/>
            </div>
            <div class="form-group">
              <label for="phone_number">Phone Number</label>
              <input id="phone_number" disabled class="form-control" name="phone_number" value="{{ $orders->phone_number }}"/>
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              <input id="note" disabled class="form-control" name="note" value="{{ $orders->note }}"/>
            </div>

            <div class="form-group">
              <label for="created_at">Created at</label>
              <input id="created_at" disabled class="form-control" name="created_at" value="{{ $orders->created_at }}"/>

            </div>
            <div class="form-group row">
            <input id="order_success" type="checkbox" class="form-control" name="order_success" value="{{ $orders->order_success }}"/>
              <label for="order_success">Order Completed?</label>

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
    </form>
  </section>
  <!-- /.content -->
</div>

@endsection
