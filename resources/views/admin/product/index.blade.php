@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>

        </div>
      </div>

      <form type="get" action="{{ Route('admin.searchProduct') }}">
          <input type="search" style="width:350px; height:35px; " name="search" class="but1 m-2" value = ""  placeholder="Search Product">
          <input style="background-color:#83cc83;pading-left:40px;pading-right:40px;height:35px;" type="submit" class="but1" value="Search">
          <a style="margin-left: 48%; text-align: right; background-color: #1ea5ff; color: black; padding: 5px; border: 3px solid #003cff;" href="{{ Route('admin.product.create') }}">Create Product</a>
      </form>
       
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
                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{ Route('admin.product.edit', $item->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ Route('admin.deleteproduct', $item->id) }}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
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
                        <div class="product__pagination">
                            {{$prods->appends(request()->all())->links()}}
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
