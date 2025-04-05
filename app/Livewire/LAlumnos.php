<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Alumnos;

class LAlumnos extends Component
{
  public $ALUMNOS = [];
  public $ID, $Nombre, $Apellidos, $Grado, $Grupo, $Status, $Contenido;
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
  public function GuardarAlumno()
  {
    $this->validate([
      'Nombre' => 'required|string|max:255',
      'Apellidos' => 'required|string|max:255',
      'Grado' => 'required|string|max:10',
      'Grupo' => 'required|string|max:10',
      'Status' => 'nullable|in:Activo,Inactivo',
    ]);

    Alumnos::create([
      'Nombre' => $this->Nombre,
      'Apellidos' => $this->Apellidos,
      'Grado' => $this->Grado,
      'Grupo' => $this->Grupo,
      'Status' => $this->Status,
    ]);

    session()->flash('message', 'Alumno registrado exitosamente.');

    $this->reset(['Nombre', 'Apellidos', 'Grado', 'Grupo', 'Status']);

    $this->dispatch('cerrarNuevoAlumno');
    $this->Filtrar();
  }
  public function Limpiar()
  {
    $this->reset(['Nombre', 'Apellidos', 'Grado', 'Grupo', 'Status']);
  }
  public function darDeBaja($id)
  {
    dd($id);
    try {
      $alumno = Alumnos::findOrFail($id);
      $alumno->Status = 'Inactivo';
      $alumno->save();
    } catch (\Exception $e) {
    }
  }
}
