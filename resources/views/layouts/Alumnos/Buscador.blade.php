<div class="row mb-4 align-items-center">
  <!-- Filtros -->
  <div class="col-md-6">
    <div class="d-flex align-items-center gap-2 flex-wrap">
      <select class="form-select select-enhanced" wire:model="Grado" style="width: 150px;">
        <option value="">📘 Grado</option>
        @foreach (["1", "2", "3", "4", "5", "6"] as $grado)
        <option value="{{ $grado }}">{{ $grado }}</option>
        @endforeach
      </select>

      <select class="form-select select-enhanced" wire:model="Grupo" style="width: 150px;">
        <option value="">👥 Grupo</option>
        @foreach (["A", "B", "C"] as $grupo)
        <option value="{{ $grupo }}">{{ $grupo }}</option>
        @endforeach
      </select>

      <button class="btn btn-outline-primary d-flex align-items-center gap-2 transition-all"
        wire:click="Filtrar">
        <i class="bi bi-funnel-fill"></i>
        Filtrar
      </button>
    </div>
  </div>

  <!-- Botones de acción -->
  <div class="col-md-6 text-md-end mt-3 mt-md-0 d-flex justify-content-md-end gap-2 flex-wrap">
    <button class="btn btn-outline-success d-flex align-items-center gap-2 transition-all"
      wire:click="abrirNuevoAlumno">
      <i class="bi bi-plus-lg"></i>
      Agregar Alumno
    </button>

    <button class="btn btn-outline-success d-flex align-items-center gap-2 transition-all"
      wire:click="AbrirImportar">
      <i class="bi bi-file-earmark-arrow-up-fill"></i>
      Importar Alumnos
    </button>
  </div>

</div>