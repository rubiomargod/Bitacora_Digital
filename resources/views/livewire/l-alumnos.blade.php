<div class="container py-4" style="padding-top: 3.5rem !important;">
  <link href="{{ asset('CSS/ALUMNOS.css') }}" rel="stylesheet">
  @if (session('success') || $errors->any())
  <div class="modal fade" id="modalMessages" tabindex="-1" aria-labelledby="modalLabelMessages" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabelMessages">
            @if(session('success')) ✅ Éxito @else ❌ Error @endif
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if (session('success'))
          {{ session('success') }}
          @endif
          @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>❗ {{ $error }}</li>
            @endforeach
          </ul>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="container">
    <h3 class="text-center mb-5">📚 Lista de ALUMNOS</h3>
    @include('Layouts.Alumnos.Buscador')
    @include('Layouts.Alumnos.FRMNuevo')
    @include('Layouts.Alumnos.FRMAlta')
    @include('Layouts.Alumnos.FRMBaja')
    @if($Contenido == 'Buscar')
    @include('Layouts.Alumnos.DTGAlumnos')
    @endif
  </div>
</div>