<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ Route('admin') }}" class="brand-link">
    <img src="{{ asset('/fe/img/logo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8;">
    <span class="brand-text font-weight-light">WoodExpress Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('/fe/img/logo.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Administrator</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


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
        <a href="{{ Route('admin.product.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product List</p>
              </a>
        </li>

        <li class="nav-item">
        <a href="{{ Route('admin.user') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
              </a>
        </li>
        <li class="nav-item">
        <a href="{{ Route('admin.order.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Orders</p>
              </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
