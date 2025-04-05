<!-- Modal de Creación de Alumno -->
<div class="modal fade" id="modalCrearAlumno" tabindex="-1" aria-labelledby="modalLabelCrearAlumno" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCrearAlumno">➕ Crear Alumno</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="Limpiar"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="GuardarAlumno">
          <div class="form-group mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" id="Nombre" class="form-control" placeholder="Nombre" wire:model="Nombre" required>
          </div>

          <div class="form-group mb-3">
            <label for="Apellidos" class="form-label">Apellidos</label>
            <input type="text" id="Apellidos" class="form-control" placeholder="Apellidos" wire:model="Apellidos" required>
          </div>

          <!-- Campo Grado -->
          <div class="form-group mb-3">
            <label for="Grado" class="form-label">Grado</label>
            <select id="Grado" class="form-select" wire:model="Grado" required>
              <option value="">Seleccione un grado</option>
              <option value="1">Primero</option>
              <option value="2">Segundo</option>
              <option value="3">Tercero</option>
              <option value="4">Cuarto</option>
              <option value="5">Quinto</option>
              <option value="6">Sexto</option>
            </select>
          </div>

          <!-- Campo Grupo -->
          <div class="form-group mb-3">
            <label for="Grupo" class="form-label">Grupo</label>
            <select id="Grupo" class="form-select" wire:model="Grupo" required>
              <option value="">Seleccione un grupo</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
            </select>
          </div>

          <!-- Campo Estado -->
          <div class="form-group mb-3">
            <label for="Status" class="form-label">Estado</label>
            <select id="Status" class="form-select" wire:model="Status" required>
              <option value="">Seleccione el estado</option>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success w-100">Registrar Alumno</button>
        </form>

      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('abrirNuevoAlumno', () => {
      let modal = new bootstrap.Modal(document.getElementById('modalCrearAlumno'));
      modal.show();
    });

    Livewire.on('cerrarNuevoAlumno', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('modalCrearAlumno'));
      modal.hide();
    });
  });
</script>