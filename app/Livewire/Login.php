<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;

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
  public function Restablecer()
  {
    $this->Estatus = "Restablecer";
  }
  public function Acceder()
  {
    $user = User::where('email', $this->Email)->first();
    if (!empty($user)) {
      if ($this->Clave == $user->password)
        if ($user->role == 'Director') {
          session(['ROLE' => 'Director']);
          return redirect()->to('/');
        } else {
          session(['ROLE' => 'Maestro']);
          return redirect()->to('/');
        }
      else {
        $this->Errores = 'Correo o contraseña incorrectos.';
        $this->dispatch('AbrirMensaje'); // Emitimos evento
      }
    } else {
      $this->Errores = 'Correo o contraseña incorrectos.';
      $this->dispatch('AbrirMensaje'); // Emitimos evento
    }
  }


  public function sendResetLinkEmail()
  {
    $this->Estatus = "Acceder";
    dd("Correo Enviado XD");
    $Correo->validate(['correo' => 'required|email']);

    $admin = User::where('correo', $Correo->correo)->first();

    if ($admin) {
      $token = Str::random(60);

      // Guardar el token en la tabla password_reset_tokens
      DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $admin->correo],
        ['token' => $token, 'created_at' => now()]
      );

      Mail::to($admin->correo)->send(new AdminPasswordResetMail($token));

      return back()->with('status', 'Se ha enviado un enlace de restablecimiento a tu correo.');
    }

    return back()->withErrors(['correo' => 'No se encontró un administrador con este correo.']);
  }
}
