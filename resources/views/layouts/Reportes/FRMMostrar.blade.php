<!-- Modal para ver detalles de la incidencia -->
<div wire:ignore.self class="modal fade" id="Mostrar" tabindex="-1" aria-labelledby="viewIncidentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">🔎 Detalles de la Incidencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="LimpiarReporte"></button>
      </div>
      <div class=" modal-body">
        <p><strong>Alumno:</strong> {{ $ID }}</p>
        <p><strong>Motivo:</strong> {{ $Motivos }}</p>
        <p><strong>Descripción:</strong> {{ $Descripcion }}</p>
        <p><strong>Status:</strong>
          <span class="badge {{ $Status == 'Leído' ? 'bg-success' : 'bg-warning' }}">
            {{ $Status }}
          </span>
        </p>
      </div>
      <a href="" class="btn btn-primary w-100">📄 Exportar a PDF</a>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('abrirMostrar', () => {
      var modal = new bootstrap.Modal(document.getElementById('Mostrar'));
      modal.show();
    });
  });
</script>