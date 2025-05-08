<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Maestros;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LMaestros extends Component
{
  use WithFileUploads;

  protected $rules = [
    'archivo' => 'required|file|mimes:txt,csv',
  ];

  public $Accion, $ID, $Nombre, $Apellidos, $Usuario, $password, $Telefono, $Correo, $Status, $archivo;

  public function mount($ID = null)
  {
    if ($ID) {
      $maestro = Maestros::find($ID);
      if ($maestro) {
        $this->ID = $maestro->id;
        $this->Nombre = $maestro->Nombre;
        $this->Apellidos = $maestro->Apellidos;
        $this->Usuario = $maestro->Usuario;
        $this->password = $maestro->password;
        $this->Telefono = $maestro->Telefono;
        $this->Correo = $maestro->Correo;
        $this->Status = $maestro->Status;
      }
    }
  }
  public function AbrirImportar()
  {
    $this->dispatch('AbrirImportar');
  }
  public function importar()
  {
    $this->validate([
      'archivo' => 'required|file|mimes:csv,txt|max:2048',
    ]);

    $path = $this->archivo->getRealPath();
    $file = fopen($path, 'r');

    $firstLine = true;

    while (($data = fgetcsv($file, 1000, ',')) !== false) {
      if ($firstLine) {
        $firstLine = false; // Saltar encabezado
        continue;
      }

      Maestros::create([
        'Nombre'    => $data[0],
        'Apellidos' => $data[1],
        'Usuario'   => $data[2],
        'password'  => Hash::make($data[3]),
        'Telefono'  => $data[4],
        'Correo'    => $data[5],
        'Status'    => $data[6],
      ]);
    }

    fclose($file);
    $this->dispatch('CerrarImportar');
    session()->flash('message', 'Usuarios importados correctamente.');
  }
  public $MAESTROS = [];
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
        'password' => bcrypt($this->password),
        'Telefono' => $this->Telefono,
        'Correo' => $this->Correo,
        'Status' => "Activo",
      ]);

      User::create([
        'name' => $this->Nombre,
        'email' => $this->Correo,
        'password' => bcrypt($this->password),
        'role' => "Maestro",
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
    $this->Telefono = $maestro->Telefono;
    $this->Correo = $maestro->Correo;
    $this->Status = $maestro->Status;
    $this->dispatch('AbrirNuevoMaestro');
  }

  public function EditarMaestro()
  {
    try {
      $maestro = Maestros::findOrFail($this->ID);
      $maestro->Nombre = $this->Nombre;
      $maestro->Apellidos = $this->Apellidos;
      $maestro->Usuario = $this->Usuario;
      $maestro->Telefono = $this->Telefono;
      $maestro->Correo = $this->Correo;
      $maestro->Status = $this->Status;
      $maestro->save();
      $this->Limpiar();
      return redirect()->route('MAESTROS')->with('success', 'Maestro editado correctamente.');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Hubo un problema al editar el Maestro. Inténtalo nuevamente.'])->withInput();
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
