<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Alumnos;
use Livewire\WithFileUploads;


class LAlumnos extends Component
{
  public $ALUMNOS = [];
  public $ID, $Nombre, $Apellidos, $Grado, $Grupo, $Status, $Contenido, $archivo;
  use WithFileUploads;
  public function render()
  {
    return view('livewire.l-alumnos');
  }
  public function abrirNuevoAlumno()
  {
    $this->dispatch('abrirNuevoAlumno');
  }
  public function Filtrar()
  {
    $this->Contenido = 'Buscar';
    $sql = "SELECT * FROM alumnos WHERE 1=1";
    $bindings = [];
    if (!empty($this->Grado)) {
      $sql .= " AND Grado = ?";
      $bindings[] = $this->Grado;
    }
    if (!empty($this->Grupo)) {
      $sql .= " AND Grupo = ?";
      $bindings[] = $this->Grupo;
    }
    $this->ALUMNOS = DB::select($sql, $bindings);
  }
  public function Limpiar()
  {
    $this->reset(['Nombre', 'Apellidos', 'Grado', 'Grupo', 'Status']);
  }
  public function GuardarAlumno()
  {
    $this->validate([
      'Nombre' => 'required|string|max:255',
      'Apellidos' => 'required|string|max:255',
      'Grado' => 'required|string|max:10',
      'Grupo' => 'required|string|max:10',
      'Status' => 'nullable|in:Activo,Inactivo',
    ]);
    try {
      Alumnos::create([
        'Nombre' => $this->Nombre,
        'Apellidos' => $this->Apellidos,
        'Grado' => $this->Grado,
        'Grupo' => $this->Grupo,
        'Status' => $this->Status,
      ]);
      $this->Limpiar();
      $this->Filtrar();
      return redirect()->route('ALUMNOS')->with('success', 'Alumno creado correctamente.');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => 'Hubo un problema al crear el alumno. Inténtalo nuevamente.'])->withInput();
    }
  }

  public function DarBaja($id)
  {
    try {
      $alumno = Alumnos::findOrFail($id);
      $alumno->Status = 'Inactivo';
      $alumno->save();
      $this->Limpiar();
      $this->dispatch('CerrarModelBaja');
      return redirect()->route('ALUMNOS')->with('success', 'Alumno dado de baja.');
    } catch (\Exception $e) {
      return redirect()->route('ALUMNOS')->withErrors(['error' => 'Hubo un problema al dar de baja al alumno.']);
    }
  }
  public function DarAlta($id)
  {
    try {
      $alumno = Alumnos::findOrFail($id);
      $alumno->Status = 'Activo';
      $alumno->save();
      $this->Limpiar();
      $this->dispatch('CerrarModelAlta');
      return redirect()->route('ALUMNOS')->with('success', 'Alumno dado de alta.');
    } catch (\Exception $e) {
      return redirect()->route('ALUMNOS')->withErrors(['error' => 'Hubo un problema al dar de alta al alumno.']);
    }
  }
  public function Baja($ID)
  {
    $Alumno = Alumnos::find($ID);
    $this->ID = $Alumno->id;
    $this->Nombre = $Alumno->Nombre;
    $this->Apellidos = $Alumno->Apellidos;
    $this->Grado = $Alumno->Grado;
    $this->Grupo = $Alumno->Grupo;
    $this->Status = $Alumno->Status;
    $this->dispatch('AbrirModelBaja');
  }
  public function Alta($ID)
  {
    $Alumno = Alumnos::find($ID);
    $this->ID = $Alumno->id;
    $this->Nombre = $Alumno->Nombre;
    $this->Apellidos = $Alumno->Apellidos;
    $this->Grado = $Alumno->Grado;
    $this->Grupo = $Alumno->Grupo;
    $this->Status = $Alumno->Status;
    $this->dispatch('AbrirModelAlta');
  }
  public function AbrirImportar()
  {
    $this->dispatch('AbrirImportar');
  }
  public function CerrarImportar()
  {
    $this->dispatch('CerrarImportar');
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
        $firstLine = false;
        continue;
      }

      Alumnos::create([
        'Nombre'        => $data[0],
        'Apellidos'     => $data[1],
        'Grado'         => $data[2],
        'Grupo'         => $data[3],
        'Status'        => $data[4],
      ]);
    }
    fclose($file);
    $this->dispatch('CerrarImportar');
    return redirect()->route('ALUMNOS')->with('success', 'Alumnos importados.');
  }
}
