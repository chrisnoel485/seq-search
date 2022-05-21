<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <form action="/aset/cari" method="GET">
          <div class="input-group" data-widget="sidebar-search">
	          <input type="text" name="cari" placeholder="Cari Aset" value="{{ old('cari') }}">
		        <input type="submit" value="CARI">
          </div>
	      </form>
      </div>

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
          <li class="nav-header">Management Aset</li>
          <li class="nav-item">
            <a href="{{ route('aset.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Aset</p>
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