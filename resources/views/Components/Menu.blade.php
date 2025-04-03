<link rel="stylesheet" href="{{ asset('CSS/Menu.css') }}">
<div class="sidebar p-3 collapsed" id="sidebar">
  <button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
  </button>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="/" class="nav-link">
        <i class="bi bi-house"></i>
        <span class="sidebar-text">Inicio</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="{{route('REPORTES')}}" class="nav-link">
        <i class="bi bi-people-fill"></i> <!-- Ícono de nieve -->
        <span class="sidebar-text">Incidencias</span>
      </a>
    </li>
  </ul>
  <ul class="nav flex-column nav-bottom">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="bi bi-box-arrow-right"></i>
        <span class="sidebar-text">Salir</span>
      </a>
    </li>
  </ul>
  <script src="{{ asset('JS/Menu.js') }}"></script>
</div>