@extends('admin.layout.layout')

@section('contents')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Products</h1>

         <form type="get" action="{{ Route('admin.search') }}">
          <input type="search" style="width:350px; height:35px; " name="search" class="but1"  placeholder="Search user">
          <input style="background-color:#83cc83;pading-left:40px;pading-right:40px;height:35px;" type="submit" class="but1" value="Search">
        </form>
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
                    <th style="width: 20%">Email</th>
                    <th style="width: 10%">Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @if (isset($users))
              @foreach($users as $user)
              <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <!-- <a class="btn btn-info btn-sm" href="{{ Route('admin.edituser', $user->id) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a> -->
                        <a class="btn btn-danger btn-sm" href="{{ Route('admin.deleteuser', $user->id) }}">
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
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>

@endsection