<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Maestros;
use Illuminate\Support\Facades\Hash;

class LMaestros extends Component
{
  public $MAESTROS = [];
  public $Accion, $ID, $Nombre, $Apellidos, $Usuario, $password, $Telefono, $Correo, $Status;
  public function render()
  {
    $this->MAESTROS = Maestros::all();
    return view('livewire.l-maestros');
  }
  public function Limpiar()
  {
    $this->reset([
      'ID',
      'Nombre',
      'Apellidos',
      'Usuario',
      'password',
      'Telefono',
      'Correo',
      'Status',
    ]);
  }
  public function AbrirNuevoMaestro()
  {
    $this->Accion = "NuevoMaestro";
    $this->dispatch('AbrirNuevoMaestro');
  }
  public function NuevoMaestro()
  {
    try {
      Maestros::create([
        'Nombre' => $this->Nombre,
        'Apellidos' => $this->Apellidos,
        'Usuario' => $this->Usuario,
        'password' => $this->password,
        'Telefono' => $this->Telefono,
        'Correo' => $this->Correo,
        'Status' => $this->Status,
      ]);

      $this->Limpiar();
      return redirect()->route('MAESTROS')->with('success', 'Maestro agregado correctamente.');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Hubo un problema al crear el Maestro. Inténtalo nuevamente.'])->withInput();
    }
  }
  public function AbrirEditarMaestro($ID)
  {
    $this->Accion = "EditarMaestro";
    $maestro = Maestros::findOrFail($ID);
    $this->ID = $maestro->id;
    $this->Nombre = $maestro->Nombre;
    $this->Apellidos = $maestro->Apellidos;
    $this->Usuario = $maestro->Usuario;
    $this->password = $maestro->Password;
    $this->Telefono = $maestro->Telefono;
    $this->Correo = $maestro->Correo;
    $this->Status = $maestro->Status;
    $this->dispatch('AbrirNuevoMaestro');
  }
  public function EditarMaestro()
  {
    try {
      $maestro = Maestros::findOrFail($this->ID);

      $maestro->update([
        'Nombre' => $this->Nombre,
        'Apellidos' => $this->Apellidos,
        'Usuario' => $this->Usuario,
        'password' => $this->password,
        'Telefono' => $this->Telefono,
        'Correo' => $this->Correo,
        'Status' => $this->Status,
      ]);
      $this->Limpiar();
      return redirect()->route('MAESTROS')->with('success', 'Maestro Editado correctamente.');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Hubo un problema al Editar el Maestro. Inténtalo nuevamente.'])->withInput();
    }
  }
  public function AbrirEliminarMaestro($ID)
  {
    $maestro = Maestros::find($ID);
    $this->ID = $maestro->id;
    $this->Nombre = $maestro->Nombre;
    $this->Apellidos = $maestro->Apellidos;
    $this->Usuario = $maestro->Usuario;
    $this->password = $maestro->Password;
    $this->Telefono = $maestro->Telefono;
    $this->Correo = $maestro->Correo;
    $this->Status = $maestro->Status;
    $this->dispatch('AbrirEliminarMaestro');
  }
  public function Eliminar($ID)
  {
    Maestros::findOrFail($ID)->delete();
    return redirect()->route('MAESTROS')->with('success', 'Maestro Borrado correctamente.');
  }
}
