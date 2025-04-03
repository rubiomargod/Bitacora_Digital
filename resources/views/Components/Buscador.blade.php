<div class="card-body">
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input type="text" class="form-control" placeholder="Buscar incidencias..." wire:model="Buscara">
          <button class="btn btn-outline-secondary" type="button" wire:click="Buscar">
            Buscar
          </button>
          <button class="btn btn-primary" type="button" wire:click="abrirNuevo">
            <i class="bi bi-plus-lg"></i> Agregar Nuevo
          </button>
        </div>
      </div>
    </div>
  </div>
</div>