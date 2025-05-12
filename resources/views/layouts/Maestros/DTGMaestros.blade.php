@if (empty($MAESTROS))
<div class="alert alert-warning text-center mt-3">
  ⚠️ No se encontraron maestros con los filtros seleccionados.
</div>
@else
<div style="max-height: 510px; overflow-y: auto;" class="mt-3">
  <ul class="list-group">
    @foreach ($MAESTROS as $maestro)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <h5 class="mb-1">{{ $maestro->Nombre }} {{ $maestro->Apellidos }}</h5>
        <p class="mb-1"><strong>Usuario:</strong> {{ $maestro->Usuario }}</p>
        <p class="mb-1"><strong>Correo:</strong> {{ $maestro->Correo }}</p>
        <p class="mb-1"><strong>Teléfono:</strong> {{ $maestro->Telefono }}</p>
        <p class="mb-1">
          <strong>Estado:</strong>
          <span class="badge {{ $maestro->Status === 'Activo' ? 'bg-success' : 'bg-danger' }}">
            {{ $maestro->Status }}
          </span>
        </p>
      </div>
      <div class="d-flex flex-column gap-2">
        <button class="btn btn-warning btn-sm" wire:click="AbrirEditarMaestro({{ $maestro->id }})"> Editar</button>
        <button class="btn btn-danger btn-sm" wire:click="AbrirEliminarMaestro({{ $maestro->id }})"> Eliminar</button>
      </div>
    </li>
    @endforeach
  </ul>
</div>
@endif