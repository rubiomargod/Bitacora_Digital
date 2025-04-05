@if (empty($ALUMNOS))
<div class="alert alert-warning text-center mt-3">⚠️ No se encontraron alumnos con los filtros seleccionados.</div>
@else
<ul class="list-group">
  @foreach ($ALUMNOS as $alumno)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
      <h5 class="mb-1">{{ $alumno->Nombre }} {{ $alumno->Apellidos }}</h5>
      <p class="mb-1"><strong> Número de Control:</strong> {{ $alumno->id }}</p>
      <p class="mb-1"><strong> Grado:</strong> {{ $alumno->Grado }} <strong> Grupo:</strong> {{ $alumno->Grupo }}</p>
      <p class="mb-1"><strong> Estado:</strong>
        <span class="badge {{ $alumno->Status === 'Activo' ? 'bg-success' : 'bg-danger' }}">{{ $alumno->Status }}</span>
      </p>
    </div>

    @if ($alumno->Status === 'Activo')
    <button type="button" class="btn btn-danger" wire:click="darDeBaja({{ $alumno->id }})">🚫 Dar de Baja</button>
    @else
    <button type="button" class="btn btn-success" wire:click="Alta({{ $alumno->id }})">🔼 Dar de Alta</button>
    @endif
  </li>
  @endforeach
</ul>
@endif
</div>