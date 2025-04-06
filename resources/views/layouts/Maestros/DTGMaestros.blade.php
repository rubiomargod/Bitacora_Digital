<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Usuario</th>
      <th>Correo</th>
      <th>Teléfono</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($MAESTROS as $maestro)
    <tr>
      <td>{{ $maestro->Nombre }}</td>
      <td>{{ $maestro->Apellidos }}</td>
      <td>{{ $maestro->Usuario }}</td>
      <td>{{ $maestro->Correo }}</td>
      <td>{{ $maestro->Telefono }}</td>
      <td>{{ $maestro->Status ? 'Activo' : 'Inactivo' }}</td>
      <td>
        <button class="btn btn-warning btn-sm" wire:click="AbrirEditarMaestro({{ $maestro->id }})">Editar</button>
        <button class="btn btn-danger btn-sm" wire:click="AbrirEliminarMaestro({{ $maestro->id }})">Eliminar</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>