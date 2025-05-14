<div class="container py-4">
  @include('layouts.Maestros.MSG')

  {{-- Título --}}
  <div class="row mb-3">
    <div class="col">
      <h1 class="mb-0">📋 Lista de Maestros</h1>
    </div>
  </div>

  {{-- Barra de búsqueda + botones en la misma línea --}}
  <div class="row align-items-center mb-4">
    <div class="col-md-6">
      <div class="input-group">
        <input type="text" wire:model="buscarNombre" class="form-control" placeholder="Buscar por nombre">
        <button class="btn btn-primary" type="button" wire:click="Filtrar">Buscar</button>
      </div>
    </div>

    <div class="col-md-6 text-end d-flex justify-content-md-end gap-2 flex-wrap mt-2 mt-md-0">
      <button class="btn btn-outline-primary d-flex align-items-center gap-2" wire:click="AbrirNuevoMaestro">
        <i class="bi bi-plus-lg"></i> Agregar Maestro
      </button>

      <button class="btn btn-outline-primary d-flex align-items-center gap-2" wire:click="AbrirImportar">
        <i class="bi bi-file-earmark-arrow-up-fill"></i> Importar Maestro
      </button>
    </div>
  </div>

  {{-- Contenedor principal --}}
  @include('layouts.Maestros.importar-maestros')
  @include('layouts.Maestros.DTGMaestros')
  @include('layouts.Maestros.FRMNuevo')
  @include('layouts.Maestros.FRMEliminar')
</div>