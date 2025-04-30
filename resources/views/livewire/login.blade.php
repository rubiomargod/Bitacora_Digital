<div class="body full-height d-flex align-items-center justify-content-center">
  @include('Components.MSG')
  @if($Estatus == "Acceder")
  <div class="container d-flex justify-content-center">
    <div class="row w-100">
      <div class="col-md-12 d-flex justify-content-center">
        <div class="card d-flex align-items-center justify-content-center" style="min-height: 400px; padding: 30px;">
          <div class="card-header w-100 text-center">
            <h3 class="p-2 pt-3">Iniciar sesión</h3>
          </div>
          <div class="card-body d-flex flex-column align-items-center justify-content-center w-100">
            <form class="w-100" wire:submit.prevent="Acceder">
              @csrf
              <div class="form-group mb-3">
                <label for="email"></label>
                <input id="email" type="email" class="mt-2 form-control @error('email') is-invalid @enderror" required autocomplete="email" autofocus wire:model="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label for="password"></label>
                <input id="password" type="password" class="mt-2 form-control @error('password') is-invalid @enderror" required autocomplete="current-password" wire:model="Clave">
                @error('password')
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
              {{ __('Reestablecer contraseña') }}
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
              <input id="correo" type="email" class="form-control mt-2 @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required>
              @error('correo')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group text-center mt-4">
              <button type="submit" class="btn btn-primary px-4">
                {{ __('Enviar Enlace') }}
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