<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
  public function showResetForm(Request $request)
  {
    $estatus = $request->query('estatus');
    $token = $request->query('token');
    if ($estatus === 'ResetForm' && $token) {
      return view('auth.passwords-reset', compact('estatus', 'token'));
    }
    return redirect('Login')->with('error', 'No se puede procesar tu solicitud.');
  }

  public function update(Request $request)
  {
    // Validar los datos recibidos
    $validated = $request->validate([
      'email' => 'required|email',
      'password' => 'required|confirmed|min:8',
    ]);

    // Buscar al usuario por correo
    $user = User::where('email', $request->email)->first();

    // Verificar si el usuario existe
    if (!$user) {
      return redirect()->back()->with('error', 'Usuario no encontrado.');
    }

    // Actualizar la contraseña del usuario
    try {
      $user->password = Hash::make($request->password);
      $user->save();
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Ocurrió un error al actualizar la contraseña.');
    }

    // Redireccionar al login con mensaje de éxito
    return redirect('/Login')->with('success', 'Contraseña cambiada exitosamente.');
  }
}
