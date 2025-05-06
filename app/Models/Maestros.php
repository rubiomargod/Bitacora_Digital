<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Maestros extends Model
{
  protected $fillable = ['Nombre', 'Apellidos', 'Usuario', 'password', 'Telefono', 'Correo', 'Status'];

  // Mutator para hashear la contraseña
  public function setPasswordAttribute($value)
  {
    if ($value) {
      $this->attributes['password'] = Hash::make($value);
    }
  }
}
