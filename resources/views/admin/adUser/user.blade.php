@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>

         <form type="get" action="{{ Route('admin.searchUser') }}">
          <input type="search" style="width:350px; height:35px; " name="search" class="but1 p-2"  placeholder="Search user">
          <input style="background-color:#83cc83;pading-left:40px;pading-right:40px;height:35px;" type="submit" class="btn btn-success" value="Search">
        </form>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 10%">Id</th>
                    <th style="width: 20%">Username</th>
                    <th style="width: 30%">Email</th>
                    <th style="width: 20%">Phone Number</th>
                    <th style="width: 20%">Address</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @if (isset($users))
              @foreach($users as $user)
              <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->address }}</td>

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
                        <div style="text-align: center; padding-left:35%;" class="product__pagination1">
                            {{$users->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>

@endsection
