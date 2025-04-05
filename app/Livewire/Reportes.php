<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Alumnos;
use App\Models\Reporte;


class Reportes extends Component
{

  public $Role = "";
  public $Buscara = "";
  public $incidencias = [];
  public $alumnos = [];
  public $Contenido = "";
  public $Accion = "";
  public $ID = 0;
  public $Motivos = "";
  public $Descripcion = "";
  public $FKIDAlumno = "";
  public $Status = "";
  public function LimpiarReporte()
  {
    $this->ID = 0;
    $this->Motivos = "";
    $this->Descripcion = "";
    $this->FKIDAlumno = "";
    $this->Status = "";
  }
  public function render()
  {
    $this->Role = session('ROLE');
    $this->alumnos = Alumnos::all();
    return view('livewire.reportes');
  }
  public function abrirNuevo()
  {
    $this->dispatch('abrirNuevo');
  }
  public function Guardar()
  {
    $reporte = new Reporte();
    $reporte->FKIDMaestro = 1;
    $reporte->Motivos = $this->Motivos;
    $reporte->Descripción = $this->Descripcion;
    $reporte->FKIDAlumno = $this->FKIDAlumno;
    $reporte->Status = "No Leído";

    $reporte->save(); // Se guarda antes de hacer cualquier otra acción
    $this->dispatch('cerrarNuevo');
    $this->LimpiarReporte(); // Limpiar formulario
    $this->Buscar();
  }

  public function Buscar()
  {
    $this->Contenido = 'Buscar';
    $this->incidencias = Reporte::where('Descripción', 'like', '%' . $this->Buscara . '%')->get();
  }

  public function Editar($ID)
  {
    $incidencias = Reporte::find($ID);
    $this->ID = $incidencias->id;
    $this->FKIDMaestro = $incidencias->FKIDMaestro;
    $this->FKIDAlumno = $incidencias->FKIDAlumno;
    $this->Motivos = $incidencias->Motivos;
    $this->Descripcion = $incidencias->Descripción;
    $this->Status = $incidencias->Status;

    $this->dispatch('abrirEditar');
  }
  public function Actualizar()
  {
    Reporte::where('id', $this->ID)->update([
      'Motivos' => $this->Motivos,
      'Descripción' => $this->Descripcion,
      'FKIDAlumno' => $this->FKIDAlumno,
      'Status' => $this->Status,
    ]);
    $this->Buscar();
    $this->LimpiarReporte();
    $this->dispatch('cerrarEditar');
  }
  public function Preguntar($ID)
  {
    $incidencias = Reporte::find($ID);
    $this->ID = $incidencias->id;
    $this->FKIDMaestro = $incidencias->FKIDMaestro;
    $this->FKIDAlumno = $incidencias->FKIDAlumno;
    $this->Motivos = $incidencias->Motivos;
    $this->Descripcion = $incidencias->Descripción;
    $this->Status = $incidencias->Status;

    $this->dispatch('abrirBorrar');
  }
  public function Eliminar()
  {
    if ($this->ID) {
      Reporte::where('id', $this->ID)->delete();
      $this->Buscar();
      $this->LimpiarReporte();
      $this->dispatch('cerrarBorrar');
    }
  }
  public function Mostrar($ID)
  {
    $incidencia = Reporte::find($ID);
    $this->ID = $incidencia->id;
    $this->Motivos = $incidencia->Motivos;
    $this->Descripcion = $incidencia->Descripción;
    $this->Status = $incidencia->Status;
    $incidencia->Status = 'Leído';
    $incidencia->save();
    $this->dispatch('abrirMostrar');
  }
}
