<style>
  .transition-all {
    transition: all 0.2s ease-in-out;
  }

  .btn-enhanced:hover {
    transform: scale(1.03);
    box-shadow: 0 0.5rem 1rem rgba(0, 128, 0, 0.2);
  }

  .select-enhanced {
    border-radius: 0.5rem;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
  }
</style>

<div class="row mb-4 align-items-center">
  <!-- Filtros -->
  <div class="col-md-6 d-flex flex-wrap gap-2">
    <select class="form-select select-enhanced" wire:model="Grado" style="min-width: 140px;">
      <option value="">📘 Grado</option>
      @foreach (["1", "2", "3", "4", "5", "6"] as $grado)
      <option value="{{ $grado }}">{{ $grado }}</option>
      @endforeach
    </select>

    <select class="form-select select-enhanced" wire:model="Grupo" style="min-width: 140px;">
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

  <!-- Botones de acción -->
  <div class="col-md-6 text-md-end mt-3 mt-md-0 d-flex justify-content-md-end gap-2 flex-wrap">
    <button class="btn btn-outline-success d-flex align-items-center gap-2 transition-all"
      wire:click="abrirNuevoAlumno">
      <i class="bi bi-plus-lg"></i>
      Agregar Alumno
    </button>

    <button class="btn btn-success d-flex align-items-center gap-2 px-4 py-2 shadow-sm rounded-pill transition-all btn-enhanced"
      wire:click="AbrirImportar"
      style="font-weight: 600;">
      <i class="bi bi-file-earmark-arrow-up-fill"></i>
      Importar Alumnos
    </button>
  </div>
</div>