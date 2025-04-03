<!-- Modal para eliminar incidencia -->
<div wire:ignore.self class="modal fade" id="Borrar" tabindex="-1" aria-labelledby="deleteIncidentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title">⚠️ Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="LimpiarReporte"></button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de que deseas eliminar esta incidencia?</p>
        <p><strong>Alumno:</strong> {{ $ID }}</p>
        <p><strong>Motivo:</strong> {{ $Motivos }}</p>
        <p><strong>Descripción:</strong> {{ $Descripcion }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <button type="button" class="btn btn-danger" wire:click="Eliminar">🗑️ Eliminar</button>

      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('abrirBorrar', () => {
      var modal = new bootstrap.Modal(document.getElementById('Borrar'));
      modal.show();
    });

    Livewire.on('cerrarBorrar', () => {
      var modal = bootstrap.Modal.getInstance(document.getElementById('Borrar'));
      modal.hide();
    });
  });
</script>