  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="ModalImportar" tabindex="-1" aria-labelledby="ModalImportarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content shadow-lg border-0">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="ModalImportarLabel">📥 Importar Alumnos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <!-- Formulario de Importación -->
          <form wire:submit.prevent="importar">
            <div class="mb-3">
              <label for="archivo" class="form-label">Selecciona archivo (.csv o .txt)</label>
              <input type="file" id="archivo" wire:model="archivo" class="form-control">
              @error('archivo')
              <div class="text-danger mt-1">{{ $message }}</div>
              @enderror
              <div wire:loading wire:target="archivo" class="text-muted mt-2">
                <div wire:loading wire:target="importar" class="d-flex align-items-center mt-2">
                  <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                  </div>
                  <span class="ms-2">Importando alumnos...</span>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-success w-100" wire:loading.attr="disabled">
              📊 Importar Alumnos
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
        const modal = new bootstrap.Modal(document.getElementById('ModalImportar'));
        modal.show();
      });

      Livewire.on('CerrarImportar', () => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('ModalImportar'));
        if (modal) modal.hide();
      });
    });
  </script>