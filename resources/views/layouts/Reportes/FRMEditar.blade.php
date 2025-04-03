<div class="modal fade" id="Editar" tabindex="-1" aria-labelledby="editIncidentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">✏️ Editar Incidencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="LimpiarReporte"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="Actualizar">
          @csrf
          <div class="mb-3">
            <label class="form-label">Motivo</label>
            <input type="text" class="form-control" required wire:model="Motivos">
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" rows="3" required wire:model="Descripcion"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Alumno</label>
            <select class="form-select" required wire:model="FKIDAlumno">
              <option value="">Selecciona un alumno</option>
              @foreach($alumnos as $alumno)
              <option value="{{ $alumno->id }}">{{ $alumno->Nombre }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success">💾 Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('abrirEditar', () => {
      var modal = new bootstrap.Modal(document.getElementById('Editar'));
      modal.show();
    });

    Livewire.on('cerrarEditar', () => {
      var modal = bootstrap.Modal.getInstance(document.getElementById('Editar'));
      modal.hide();
    });
  });
</script>