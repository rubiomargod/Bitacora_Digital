<div class="container py-4">
  @include('layouts.Maestros.MSG')

  {{-- Encabezado con acciones estilo responsive --}}
  <div class="row mb-4 align-items-center">
    {{-- Título --}}
    <div class="col-md-6 mb-3 mb-md-0">
      <h1 class="mb-0">📋 Lista de Maestros</h1>
    </div>

    {{-- Botones de acción --}}
    <div class="col-md-6 text-md-end d-flex justify-content-md-end gap-2 flex-wrap">
      <button class="btn btn-outline-primary d-flex align-items-center gap-2 transition-all"
        wire:click="AbrirNuevoMaestro">
        <i class="bi bi-plus-lg"></i>
        Agregar Maestro
      </button>

      <button class="btn btn-outline-primary d-flex align-items-center gap-2 transition-all"
        wire:click="AbrirImportar">
        <i class="bi bi-file-earmark-arrow-up-fill"></i>
        Importar Maestro
      </button>
    </div>
  </div>

  {{-- Contenedor principal --}}
  <div class="card shadow-sm">
    <div class="card-body p-3">
      {{-- Secciones cargadas --}}
      @include('layouts.Maestros.importar-maestros')
      @include('layouts.Maestros.DTGMaestros')
      @include('layouts.Maestros.FRMNuevo')
      @include('layouts.Maestros.FRMEliminar')
    </div>
  </div>
</div>