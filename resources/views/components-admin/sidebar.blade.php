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
    @if(auth()->user()->role == "admin" || auth()->user()->role == "staf")
      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      @endif
      <li class="menu-header">Website</li>
      @if(auth()->user()->role == "admin")
        <li class="nav-item dropdown {{ Request::is('staf*', 'tamu*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-users"></i><span>Modul Pengguna</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('get-staf')}}">Staff</a></li>
            <li><a class="nav-link" href="{{route('get-tamu')}}">Tamu</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown {{ Request::is('tipe-kamar*', 'kamar*') ? 'active' : '' }}">
          <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-hotel"></i><span>Modul Hotel</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('get-tipe-kamar')}}">Tipe Kamar</a></li>
            <li><a class="nav-link" href="{{route('get-kamar')}}">Kamar</a></li>
          </ul>
        </li>
      @endif
      @if(auth()->user()->role == "admin" || auth()->user()->role == "staf")
        <li class="{{ Request::is('reservasi') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('get-reservasi') }}">
            <i class="fas fa-clipboard"></i> <span>Reservasi</span>
          </a>
        </li>
      @endif
    </ul>
  </aside>
</div>
<!-- end sidebar -->
