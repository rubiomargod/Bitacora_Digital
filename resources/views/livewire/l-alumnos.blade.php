<div class="container py-4" style="padding-top: 3.5rem !important;">
  <link href="{{ asset('CSS/ALUMNOS.css') }}" rel="stylesheet">
  @include('Layouts.Alumnos.MSG')
  <div class="container">
    <h3 class="text-center mb-5">📚 Lista de ALUMNOS</h3>
    @include('Layouts.Alumnos.Buscador')
    @include('Layouts.Alumnos.FRMNuevo')
    @include('Layouts.Alumnos.FRMAlta')
    @include('Layouts.Alumnos.FRMBaja')
    @include('Layouts.Alumnos.FRMImportar')
    @if($Contenido == 'Buscar')
    @include('Layouts.Alumnos.DTGAlumnos')
    @endif
  </div>
</div>