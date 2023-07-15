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
            <li class="breadcrumb-item active">View Order Cart Detail</li>
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
            <h3 class="card-title">Order #{{ $orders->id }} Cart</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 10%">Id</th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 10%">Price</th>
                    <th style="width: 10%">Category</th>
                    <th style="width: 10%">Inventory</th>
                    <th style="width: 20%">Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @if ($prods != null && count($prods) > 0)
              @foreach($prods as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category!=null ? $item->category->name : '' }}</td>
                    <td>{{ $item->quantity}}</td>
                    <td>
                      @if ($item->image!=null)
                      <img src="{{ asset('images/' . $item->image) }}" alt=""
                            style="width:200px; height:auto;"/>
                      @endif
                    </td>
                </tr>
              @endforeach
              @else
              <tr>
                <td colspan="6">No Data</td>
              </tr>
              @endif
            </tbody>

        </table>
        <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center; padding-left:35%;"  class="product__pagination">
                            {{$prods->appends(request()->all())->links()}}
                        </div>
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
