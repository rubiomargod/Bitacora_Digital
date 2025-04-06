<div class="modal fade" id="modalDarDeBaja" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">🚫 Confirmación de Baja</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="Limpiar"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas dar de baja a <strong>{{ $Nombre }} {{ $Apellidos }}</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="Limpiar">Cancelar</button>
        <button type="button" class="btn btn-danger" wire:click="DarBaja({{$ID}})">Confirmar Baja</button>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('AbrirModelBaja', () => {
      let modal = new bootstrap.Modal(document.getElementById('modalDarDeBaja'));
      modal.show();
    });

    Livewire.on('CerrarModelBaja', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('modalDarDeBaja'));
      modal.hide();
    });
  });
</script>