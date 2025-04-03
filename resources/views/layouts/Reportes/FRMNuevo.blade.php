<div class="modal fade" id="Nuevo" tabindex="-1" aria-labelledby="createIncidentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">➕ Nueva Incidencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="Guardar">
          @csrf
          <div class="mb-3">
            <label class="form-label"> Motivo</label>
            <input type="text" class="form-control" required wire:model="Motivos">
          </div>
          <div class="mb-3">
            <label class="form-label"> Descripción</label>
            <textarea class="form-control" rows="3" required wire:model="Descripcion"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label"> Alumno</label>
            <select class="form-select" required wire:model="FKIDAlumno">
              <option value="">Selecciona un alumno</option>
              @foreach($alumnos as $alumno)
              <option value="{{ $alumno->id }}">{{ $alumno->Nombre }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success">💾 Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('abrirNuevo', () => {
      let modal = new bootstrap.Modal(document.getElementById('Nuevo'));
      modal.show();
    });

    Livewire.on('cerrarNuevo', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('Nuevo'));
      modal.hide();
    });
  });
</script>