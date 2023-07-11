<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ Route('admin') }}" class="brand-link">
<<<<<<< Updated upstream
    <img src="{{ asset('/img/logoadmin.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
=======
    <img src="{{ asset('/fe/img/logo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8;">
    <span class="brand-text font-weight-light">WoodExpress Admin</span>
>>>>>>> Stashed changes
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
<<<<<<< Updated upstream
        <img src="{{ asset('img/user1.jpg') }}" class="img-circle elevation-2" alt="User Image">
=======
        <img src="{{ asset('/fe/img/logo.png') }}" class="img-circle" alt="User Image">
>>>>>>> Stashed changes
      </div>
      <div class="info">
        <a href="#" class="d-block">WoodExpress Admin</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ Route('admin') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Product
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ Route('admin.product.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ Route('admin.product.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Create</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ Route('admin.user') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Order
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ Route('admin.order.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View orders</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
