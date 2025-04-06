<div class="modal fade" id="ModalEliminar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title"><i class="bi bi-trash-fill me-2"></i> Confirmar Eliminación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" wire:click="Limpiar"></button>
      </div>
      <div class="modal-body">
        <p class="mb-0">¿Estás seguro de que deseas eliminar a:</p>
        <h4 class="text-danger mt-2"><strong>{{ $Nombre}} {{ $Apellidos }}</strong></h4>
        <p class="mt-2 text-warning"><i class="bi bi-exclamation-triangle-fill me-2"></i> Esta acción no se puede deshacer.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="Limpiar"><i class="bi bi-x-lg me-1"></i> Cancelar</button>
        <button type="button" class="btn btn-danger" wire:click="Eliminar({{$ID}})"><i class="bi bi-trash-fill me-1"></i> Eliminar</button>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('AbrirEliminarMaestro', () => {
      let modal = new bootstrap.Modal(document.getElementById('ModalEliminar'));
      modal.show();
    });

    Livewire.on('CerrarEliminarMaestro', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('ModalEliminar'));
      modal.hide();
    });
  });
</script>