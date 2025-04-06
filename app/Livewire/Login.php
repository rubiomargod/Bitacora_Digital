<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
  public $Email = "";
  public $Clave = "";
  public $Estatus = "Acceder";
  public function render()
  {
    return view('livewire.login');
  }
  public function Acceder()
  {
    $user = User::where('email', $this->Email)->first();
    if ($this->Clave = $user->password)
      if ($user->role == 'Director') {
        session(['ROLE' => 'Director']);
        return redirect()->to('/');
      } else {
        session(['ROLE' => 'Maestro']);
        return redirect()->to('/');
      }
  }
}
