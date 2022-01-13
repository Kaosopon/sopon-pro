<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
        <div class="sidebar-brand-icon">
          <img src="{{asset('admin/img/logo/logo.jpg')}}">
        </div>
        <div class="sidebar-brand-text mx-10"> OK สเต็กพรีเมี่ยม </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('menu')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>หน้า menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('source')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>หน้า source</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('content')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>หน้า content</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('type')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>หน้า types</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('header')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>หน้า header</span>
        </a>
      </li>
      <!-- <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Examples
      </div> -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Example Pages</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span>
        </a>
      </li> -->
      <!-- <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div> -->
    </ul>
