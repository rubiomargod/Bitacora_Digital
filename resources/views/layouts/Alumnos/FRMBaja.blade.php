<div class="modal fade" id="modalDarDeAlta" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">🔼 Confirmación de Alta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="Limpiar"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas dar de alta a <strong>{{ $Nombre}} {{ $Apellidos }}</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="Limpiar">Cancelar</button>
        <button type="button" class="btn btn-success" wire:click="DarAlta({{$ID}})">Confirmar Alta</button>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('AbrirModelAlta', () => {
      let modal = new bootstrap.Modal(document.getElementById('modalDarDeAlta'));
      modal.show();
    });

    Livewire.on('CerrarModelAlta', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('modalDarDeAlta'));
      modal.hide();
    });
  });
</script>