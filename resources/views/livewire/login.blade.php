<div class="body full-height d-flex align-items-center justify-content-center">
  @include('Components.MSG')
  @if($Estatus == "Acceder")
  <div class="container d-flex justify-content-center">
    <div class="row w-100">
      @if(session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        <strong>¡Éxito!</strong> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
        <strong>¡Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <script>
        function cerrarMensaje(id) {
          const alert = document.getElementById(id);
          if (alert) {
            alert.classList.add('fade-out');
            setTimeout(function() {
              alert.style.display = 'none';
            }, 500);
          }
        }
        setTimeout(function() {
          cerrarMensaje('success-alert');
        }, 2000);
        setTimeout(function() {
          cerrarMensaje('error-alert');
        }, 2000);
      </script>

      <style>
        .fade-out {
          opacity: 0;
          transition: opacity 0.5s ease-out;
          visibility: hidden;
        }
      </style>
      <div class="col-md-12 d-flex justify-content-center">
        <div class="card d-flex align-items-center justify-content-center" style="min-height: 400px; padding: 30px;">
          <div class="card-header w-100 text-center">
            <h3 class="p-2 pt-3">Iniciar sesión</h3>
          </div>
          <div class="card-body d-flex flex-column align-items-center justify-content-center w-100">
            <form class="w-100" wire:submit.prevent="Acceder">
              @csrf
              <div class="form-group mb-3">
                <label for="email">Correo</label>
                <input id="email" type="email" class="mt-2 form-control @error('Email') is-invalid @enderror" wire:model="Email" required autofocus>
                @error('Email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="mt-2 form-control @error('Clave') is-invalid @enderror" wire:model="Clave" required>
                @error('Clave')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group text-center mt-3">
                <button type="submit" class="btn btn-primary w-100">
                  {{ __('Iniciar Sesión') }}
                </button>
            </form>

            <button class="mt-3 btn text-white border-0" wire:click="Restablecer">
              {{ __('Restablecer contraseña') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@elseif($Estatus == "Restablecer")
<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="row justify-content-center w-100">
    <div class="col-md-6" style="width: 441px;">
      <div class="card shadow">
        <div class="card-header text-center text-white">
          <h3 class="p-2 pt-3">Restablecer Contraseña</h3>
        </div>
        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <form wire:submit.prevent="sendResetLinkEmail">
            @csrf
            <div class="form-group mb-3">
              <label for="correo" class="col-form-label">Correo</label>
              <input id="correo" type="email" class="form-control mt-2 @error('Email') is-invalid @enderror" wire:model="Email" required>
              @error('Email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group text-center mt-4">
              <button type="submit" class="btn btn-primary px-4">
                {{ __('Enviar Enlace') }}
              </button>
              <button type="button" class="btn btn-link mt-3" wire:click="$set('Estatus', 'Acceder')">
                Volver al inicio de sesión
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@elseif($Estatus == "ResetForm")
<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="row justify-content-center w-100">
    <div class="col-md-6" style="width: 441px;">
      <div class="card shadow">
        <div class="card-header text-center text-white">
          <h3 class="p-2 pt-3">Nueva Contraseña</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group mb-3">
              <label for="email">Correo</label>
              <input id="email" type="email" class="form-control mt-2" name="email" required>
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
              <button type="submit" class="btn btn-primary px-4">
                Cambiar contraseña
              </button>
              <button type="button" class="btn btn-link mt-3" onclick="window.location.href='{{ url('/') }}'">
                Volver al inicio
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
</div>