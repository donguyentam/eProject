@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('admin.product.index') }}">Products</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <form action="{{ Route('admin.updateuser',$user->id)}}" class="row" method="POST" >
      @csrf
      <!-- <input type="hidden" name="_method" value="put"/> -->
      <input type="hidden" name="id" value="{{ $user->id }}"/>
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Product Information</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">Email</label>
              <input id="email" class="form-control" name="email" value="{{ $user->email }}"/>
            </div>
            <div class="form-group">
              <label for="price">Password</label>
              <input id="price" class="form-control" name="password" value="{{ $user->password }}"/>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-12">
        <input type="submit" value="Create" class="btn btn-success float-right">
      </div>
    </form>

    </section>
  <!-- /.content -->
</div>

@endsection