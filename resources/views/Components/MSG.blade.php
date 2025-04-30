@if ($Errores)
<div class="modal fade" id="modalMessages" tabindex="-1" aria-labelledby="modalLabelMessages" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow rounded-lg border-danger border-2">
      <div class="modal-header bg-danger text-white border-bottom border-danger">
        <h5 class="modal-title fw-semibold" id="modalLabelMessages"><i class="bi bi-exclamation-triangle-fill me-2"></i> Advertencia</h5>
      </div>
      <div class="modal-body py-3">
        <p class="mb-0 text-danger"><i class="bi bi-x-octagon-fill me-2"></i> {{ $Errores }}</p>
      </div>
      <div class="modal-footer border-top border-danger">
      </div>
    </div>
  </div>
</div>
@endif

<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('AbrirMensaje', () => {
      let modalElement = document.getElementById('modalMessages');
      let modalInstance = new bootstrap.Modal(modalElement);
      modalInstance.show();

      // Cerrar automáticamente después de 5 segundos
      setTimeout(() => {
        modalInstance.hide();
      }, 5000);
    });
  });
</script>