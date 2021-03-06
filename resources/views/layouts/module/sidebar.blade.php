<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Pusat Data Aset</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
         
          <li class="nav-header">Management User</li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('role.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Role</p>
            </a>
          </li>
          <li class="nav-header">Management Aset</li>
          <li class="nav-item">
            <a href="{{ route('aset.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Aset</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('posisi.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>History Aset</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('jenis.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Jenis</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('merek.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Merek</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('letak.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Letak</p>
            </a>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>