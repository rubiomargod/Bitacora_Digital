@extends('layouts.Login')
@section('title','Restablecer contraseña')
@section('body')
<div class="body full-height d-flex align-items-center justify-content-center">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
      <div class="col-md-6 d-flex justify-content-center" style="max-width: 441px;">
        <div class="card shadow d-flex align-items-center justify-content-center w-100" style="min-height: 400px; padding: 30px;">
          <div class="card-header w-100 text-center">
            <h3 class="p-2 pt-3">Nueva Contraseña</h3>
          </div>

          <!-- Mensajes de alerta -->
          @if ($errors->any())
          <div class="alert alert-danger" id="error-alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
          </div>
          @endif

          @if(session('success'))
          <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
          </div>
          @endif

          <!-- Formulario para restablecer contraseña -->
          <div class="card-body d-flex flex-column align-items-center justify-content-center w-100">
            <form method="POST" action="{{ route('password.update') }}" class="w-100">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group mb-3">
                <label for="email">Correo</label>
                <input id="email" type="email" class="form-control mt-2" name="email" value="{{ old('email') }}" required>
              </div>
              <div class="form-group mb-3">
                <label for="password">Nueva Contraseña</label>
                <input id="password" type="password" class="form-control mt-2" name="password" required>
              </div>
              <div class="form-group mb-3">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control mt-2" name="password_confirmation" required>
              </div>
              <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary w-100">
                  Cambiar contraseña
                </button>
                <button type="button" class="btn btn-link mt-3" onclick="window.location.href='/Login'">
                  Volver al inicio
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Función para cerrar el mensaje con una transición suave
  function cerrarMensaje(id) {
    const alert = document.getElementById(id);
    if (alert) {
      alert.classList.add('fade-out'); // Agregar la clase para que empiece a desvanecerse
      setTimeout(function() {
        alert.style.display = 'none'; // Esto ocultará el mensaje completamente después de la animación
      }, 500); // El tiempo coincide con el de la transición
    }
  }

  // Cerramos los mensajes después de 3 segundos (3000ms)
  setTimeout(function() {
    cerrarMensaje('success-alert');
  }, 3000);

  setTimeout(function() {
    cerrarMensaje('error-alert');
  }, 3000);
</script>

<style>
  .fade-out {
    opacity: 0;
    transition: opacity 0.5s ease-out;
  }
</style>

@endsection