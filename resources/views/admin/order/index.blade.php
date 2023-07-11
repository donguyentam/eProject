@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Orders</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Orders</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>

      <form type="get" action="{{ Route('admin.searchOrders') }}">
          <input type="search" style="width:350px; height:35px; " name="search" class="but1"  placeholder="Search Orders">
          <input style="background-color:#83cc83;pading-left:40px;pading-right:40px;height:35px;" type="submit" class="but1" value="Search">
      </form>

      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 5%">Id</th>
                    <th style="width: 8%">User Id</th>
                    <th style="width: 8%">First Name</th>
                    <th style="width: 10%">Last Name</th>
                    <th style="width: 10%">Address</th>
                    <th style="width: 15%">Phone Number</th>
                    <th style="width: 15%">Email</th>
                    <th style="width: 15%">Note</th>
                    <th style="width: 20%">Payment Method</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @if ($orders != null && count($orders) > 0)
              @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->first_name }}</td>
                    <td>{{ $order->last_name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->note }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td class="project-actions text-right">
<<<<<<< Updated upstream
                        
                        <a class="btn btn-info btn-sm" href="{{ Route('admin.order.edit', $order->id) }}">
=======
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ Route('admin.order.editOrders', $item->id) }}">
>>>>>>> Stashed changes
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
<<<<<<< Updated upstream
                        <a class="btn btn-danger btn-sm" href="{{ Route('admin.deleteuser', $order->id) }}">
                        
                        <a class="btn btn-danger btn-sm" href="#">
=======
                        <a class="btn btn-danger btn-sm" href="{{ Route('admin.deleteOrders', $user->id) }}">
>>>>>>> Stashed changes
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>    
              @endforeach
              @else
              <tr>
                <td colspan="6">No Data</td>
                <td colspan="9">No Data</td>
              </tr>
              @endif
            </tbody>
  <!-- /.content -->
</div>
@endsection
