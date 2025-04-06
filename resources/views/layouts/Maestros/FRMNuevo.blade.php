<div class="modal fade" id="ModalNuevoMaestro" tabindex="-1" aria-labelledby="modalNuevoMaestroLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevoMaestroLabel">Agregar Nuevo Maestro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar" wire:click="Limpiar"></button>
      </div>

      <div class="modal-body">
        <form wire:submit.prevent="{{$Accion}}">

          {{-- Campo Nombre --}}
          <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input type="text" id="Nombre" class="form-control" wire:model.defer="Nombre" required>
            @error('Nombre') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Campo Apellidos --}}
          <div class="mb-3">
            <label for="Apellidos" class="form-label">Apellidos:</label>
            <input type="text" id="Apellidos" class="form-control" wire:model.defer="Apellidos" required>
            @error('Apellidos') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Campo Usuario --}}
          <div class="mb-3">
            <label for="Usuario" class="form-label">Usuario:</label>
            <input type="text" id="Usuario" class="form-control" wire:model.defer="Usuario" required>
            @error('Usuario') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Campo Contraseña --}}
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" class="form-control" wire:model.defer="password" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Campo Teléfono --}}
          <div class="mb-3">
            <label for="Telefono" class="form-label">Teléfono:</label>
            <input type="text" id="Telefono" class="form-control" wire:model.defer="Telefono">
            @error('Telefono') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Campo Correo --}}
          <div class="mb-3">
            <label for="Correo" class="form-label">Correo Electrónico:</label>
            <input type="email" id="Correo" class="form-control" wire:model.defer="Correo" required>
            @error('Correo') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Campo Status --}}
          <div class="mb-3">
            <label for="Status" class="form-label">Estado:</label>
            <select id="Status" class="form-control" wire:model.defer="Status">
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
            @error('Status') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          {{-- Botones --}}
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar Maestro</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="Limpiar">Cancelar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('AbrirNuevoMaestro', () => {
      let modal = new bootstrap.Modal(document.getElementById('ModalNuevoMaestro'));
      modal.show();
    });

    Livewire.on('CerrarNuevoMaestro', () => {
      let modal = bootstrap.Modal.getInstance(document.getElementById('ModalNuevoMaestro'));
      modal.hide();
    });
  });
</script>