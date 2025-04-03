<div class="container py-4" style="padding-top: 3.5rem !important;">
  <h1 class="mb-4">Gestión de Incidencias</h1>
  <div class="card shadow-sm mb-4">
    @include('Components.Buscador')
    @if($Contenido == 'Buscar')
    @include('Layouts.Reportes.DTGReportes')
    @endif

    @include('Layouts.Reportes.FRMNuevo')
    @include('Layouts.Reportes.FRMEditar')
    @include('Layouts.Reportes.FRMBorrar')
    @include('Layouts.Reportes.FRMMostrar')
  </div>
</div>