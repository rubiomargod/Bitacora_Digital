<div class="container py-4">
  <div class="card">
    <div class="card-body">
      <!-- Formulario de Importación -->
      <h5 class="card-title mb-4">Importar Maestros</h5>

      <div class="mb-4">
        <label for="archivo" class="form-label">Seleccionar Archivo</label>
        <input type="file" id="archivo" wire:model="archivo" accept=".txt" class="form-control border p-2 rounded">
        @error('archivo')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <button wire:click="importar" class="btn btn-primary w-100">
        📊 Importar Maestros
      </button>

    </div>
  </div>
</div>