<div class="container py-4">
  @include('layouts.Maestros.MSG')
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">📋 Lista de Maestros</h1>
    <button class="btn btn-primary right" wire:click="AbrirNuevoMaestro">➕ Agregar Maestro</button>
    <button class="btn btn-primary" wire:click="AbrirImportar">📊 Importar Maestro</button>
  </div>
  <div class="card">
    <div class="card-body p-0">
      @include('layouts.Maestros.importar-maestros')
      @include('layouts.Maestros.DTGMaestros')
      @include('layouts.Maestros.FRMNuevo')
      @include('layouts.Maestros.FRMEliminar')
    </div>
  </div>
</div>