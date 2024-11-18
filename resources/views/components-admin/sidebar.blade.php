      <!-- sidebar -->
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="" class="logo">HOTEL <span>DANZ</span></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">HD</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
              <li class="active"><a class="nav-link" href="/admin/"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Website</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Modul Pengguna</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('get-staf')}}">Staff</a></li>
                  <li><a class="nav-link" href="{{route('get-tamu')}}">Tamu</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hotel"></i><span>Modul Hotel</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('get-tipe-kamar')}}">Tipe Kamar</a></li>
                  <li><a class="nav-link" href="{{route('get-kamar')}}">Kamar</a></li>
                </ul>
              </li>
            <li><a class="nav-link" href="{{route('get-reservasi')}}"><i class="fas fa-clipboard"></i> <span>Reservasi</span></a></li>
          </ul>
        </aside>
      </div>
      <!-- end sidebar -->