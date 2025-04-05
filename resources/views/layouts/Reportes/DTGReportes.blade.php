<!-- Tabla de incidencias -->
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th> Motivo</th>
        <th> Descripción</th>
        <th> Status</th>
        <th> Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($incidencias as $incidencia)
      <tr>
        <td>{{ $incidencia->Motivos }}</td>
        <td>{{ $incidencia->Descripción }}</td>
        <td>
          <span class="badge {{ [
                                        'Leído' => 'bg-success',
                                        'No Leído' => 'bg-warning',
                                    ][$incidencia->Status] ?? 'bg-secondary' }}">
            {{ $incidencia->Status }}
          </span>
        </td>
        <td>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-sm btn-outline-primary" wire:click="Mostrar({{$incidencia->id}})">
              <i class="bi bi-eye"></i>
            </button>
            @if(session('ROLE') == 'Admin')
            <button type="button" class="btn btn-sm btn-outline-warning" wire:click="Editar({{$incidencia->id}})">
              <i class="bi bi-pencil"></i>
            </button>
            @endif
            @if(session('ROLE') == 'Admin')
            <button type="button" class="btn btn-sm btn-outline-danger" wire:click="Preguntar({{$incidencia->id}})">
              <i class="bi bi-trash"></i>
            </button>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>