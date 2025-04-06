<div class="container">
  @include('layouts.Maestros.MSG')
  <h1 class="mb-4">Lista de Maestros</h1>
  <button class="btn btn-primary mb-3" wire:click="AbrirNuevoMaestro">Agregar Maestro</button>
  @include('layouts.Maestros.FRMNuevo')
  @include('layouts.Maestros.FRMEliminar')
  @include('layouts.Maestros.DTGMaestros')
</div>