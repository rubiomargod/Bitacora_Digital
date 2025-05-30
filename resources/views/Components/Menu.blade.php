<link rel="stylesheet" href="{{ asset('CSS/Menu.css') }}">
<div class="sidebar p-3 collapsed" id="sidebar">
  <button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
  </button>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="/Home" class="nav-link {{ request()->is('Home') ? 'active' : '' }}">
        <i class="bi bi-house"></i>
        <span class="sidebar-text">Inicio</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="{{route('REPORTES')}}" class="nav-link {{ request()->routeIs('REPORTES') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i>
        <span class="sidebar-text">Incidencias</span>
      </a>
    </li>
  </ul>
  @if (session('ROLE') === 'Director')
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="{{route('ALUMNOS')}}" class="nav-link {{ request()->routeIs('ALUMNOS') ? 'active' : '' }}">
        <i class="bi bi-backpack3"></i>
        <span class="sidebar-text">Alumnos</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="{{route('MAESTROS')}}" class="nav-link {{ request()->routeIs('MAESTROS') ? 'active' : '' }}">
        <i class="bi bi-people"></i>
        <span class="sidebar-text">Maestros</span>
      </a>
    </li>
  </ul>
  @endif
  <ul class="nav flex-column nav-bottom">
    <li class="nav-item">
      <a href="{{route('LOGOUT')}}" class="nav-link {{ request()->routeIs('LOGOUT') ? 'active' : '' }}">
        <i class="bi bi-box-arrow-right"></i>
        <span class="sidebar-text">Salir</span>
      </a>
    </li>
  </ul>
  <script src="{{ asset('JS/Menu.js') }}"></script>
</div>