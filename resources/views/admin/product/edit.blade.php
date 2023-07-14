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

  <!-- Main content -->
  <section class="content">
    <form action="{{ Route('admin.product.update', $product->id) }}" class="row" method="post"
                        enctype="multipart/form-data">
      @csrf
      @method('put')
      <!-- <input type="hidden" name="_method" value="put"/> -->
      <input type="hidden" name="id" value="{{ $product->id }}"/>
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
              <label for="name">Name</label>
              <input id="name" required class="form-control" name="name" value="{{ $product->name }}"/>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" required min="0" max="9999999999" id="price" class="form-control" name="price" value="{{ $product->price }}"/>
            </div>
            @if($product->image!=null)
            <div class="form-group">
            <img src="{{ asset('images/' . $product->image) }}" alt=""
                            style="width:500px; height:auto;"/>
            </div>
            @endif
            <div class="form-group mt-2">
              <label for="photo">Image</label>
              <input type="file" id="photo" class="form-control" name="photo" value="{{ asset('images/' . $product->image)}}"/>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select id="category" required class="form-control custom-select" name="category_id" required id="category_id">
                <option disabled>Select one</option>
                @foreach($cates as $item)
                <option value="{{ $item->id }}" @selected($product -> category_id == $item -> id)>{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
            <label for="quantity" >Inventory</label>
              <input id="quantity" required type="number" min="0" max="999" class="form-control" value="{{ $product->quantity }}" name="quantity"/>

              </select>
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
