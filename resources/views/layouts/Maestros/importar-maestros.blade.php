<!-- Modal -->
<div class="modal fade" id="ModalImportar" tabindex="-1" aria-labelledby="ModalImportar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalImportarLabel">Importar Maestros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario de Importación -->
        <form wire:submit.prevent="importar">
          <div class="mb-3">
            <label for="archivo" class="form-label">Seleccionar Archivo (.csv)</label>
            <input type="file" id="archivo" wire:model="archivo" accept=".txt,.csv" class="form-control">
            @error('archivo')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary w-100">
            📊 Importar Maestros
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script para controlar el modal con Livewire -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('AbrirImportar', () => {
      let modal = new bootstrap.Modal(document.getElementById('ModalImportar'));
      modal.show();
    });
    Livewire.on('CerrarImportar', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('ModalImportar'));
      document.getElementById('ModalImportar').style.display = 'none';
    });
  });
</script>