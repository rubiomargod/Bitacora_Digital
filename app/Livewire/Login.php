<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\AdminPasswordResetMail;

class Login extends Component
{
  public $Email = "";
  public $Clave = "";
  public $Errores = "";
  public $Estatus = "Acceder";

  public function render()
  {
    return view('livewire.login');
  }

  // Cambiar el estado a "Restablecer" para mostrar el formulario de restablecimiento
  public function Restablecer()
  {
    $this->Estatus = "Restablecer";
    $this->Errores = "";
  }

  // Lógica para iniciar sesión
  public function Acceder()
  {
    $this->validate([
      'Email' => 'required|email',
      'Clave' => 'required',
    ]);

    $user = User::where('email', $this->Email)->first();

    if ($user && Hash::check($this->Clave, $user->password)) {
      Auth::login($user);
      session(['ROLE' => $user->role === 'Director' ? 'Director' : 'Maestro']);

      return redirect()->route('/');
    }

    $this->Errores = 'Correo o contraseña incorrectos.';
    session()->flash('error', $this->Errores);
  }

  public function sendResetLinkEmail()
  {
    $this->validate([
      'Email' => 'required|email',
    ]);

    $user = User::where('email', $this->Email)->first();
    if ($user) {
      $token = Str::random(60);

      // Almacenamos el token en la base de datos
      DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $user->email],
        [
          'token' => $token,
          'created_at' => now()
        ]
      );

      // Enviamos el correo con el token y el email
      Mail::to($user->email)->send(new AdminPasswordResetMail($token, $user->email));
      session()->flash('status', 'Se ha enviado un enlace de restablecimiento a tu correo.');
    } else {
      session()->flash('error', 'No se encontró un usuario con este correo.');
    }
  }
}
