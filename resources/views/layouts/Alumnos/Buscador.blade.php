<div class="row mb-3 align-items-center">
  <div class="col-md-6 d-flex gap-2">
    <select class="form-select" wire:model="Grado">
      <option value=""> Seleccionar Grado</option>
      @foreach (["1", "2", "3", "4", "5", "6"] as $grado)
      <option value="{{ $grado }}">{{ $grado }}</option>
      @endforeach
    </select>

    <select class="form-select" wire:model="Grupo">
      <option value=""> Seleccionar Grupo</option>
      @foreach (["A", "B", "C"] as $grupo)
      <option value="{{ $grupo }}">{{ $grupo }}</option>
      @endforeach
    </select>
  </div>

  <div class="col-md-6 text-md-end mt-2 mt-md-0">
    <button class="btn btn-primary" wire:click="Filtrar">Filtrar</button>
    <button class="btn btn-success ms-2" wire:click="abrirNuevoAlumno">
      <i class="bi bi-plus-lg me-1"></i> Agregar Alumno
    </button>
  </div>
</div>