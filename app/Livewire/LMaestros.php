<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Maestros;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class LMaestros extends Component
{
  use WithFileUploads;

  protected $rules = [
    'archivo' => 'required|file|max:10240',
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

  public function importar()
  {
    $this->validate();
    $this->Accion = "importar";

    try {
      $path = $this->archivo->store('importaciones');
      $fullPath = storage_path('app/' . $path);
      $file = fopen($fullPath, 'r');
      $lineNumber = 1;

      while (($line = fgets($file)) !== false) {
        $line = trim($line);
        if (empty($line)) continue;

        $campos = str_getcsv($line, ',');
        if (count($campos) !== 7) {
          throw new \Exception("Error en línea $lineNumber: número incorrecto de columnas.");
        }

        [$nombre, $apellidos, $usuario, $password, $telefono, $correo, $status] = $campos;
        $maestro = Maestros::where('Usuario', $usuario)->first();

        if (!$maestro) {
          $maestro = new Maestros([
            'Nombre'    => $nombre,
            'Apellidos' => $apellidos,
            'Usuario'   => $usuario,
            'password'  => bcrypt($password),
            'Telefono'  => $telefono,
            'Correo'    => $correo,
            'Status'    => $status,
          ]);
          $maestro->save();
        } else {
          $maestro->update([
            'Nombre'    => $nombre,
            'Apellidos' => $apellidos,
            'password'  => bcrypt($password),
            'Telefono'  => $telefono,
            'Correo'    => $correo,
            'Status'    => $status,
          ]);
        }

        $lineNumber++;
      }

      fclose($file);
      session()->flash('success', 'Archivo importado y maestros procesados correctamente.');
    } catch (\Exception $e) {
      session()->flash('error', 'Error al importar o procesar el archivo: ' . $e->getMessage());
    }
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
