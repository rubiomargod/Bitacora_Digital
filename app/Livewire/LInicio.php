<?php

namespace App\Livewire;

use App\Models\Alumnos;
use App\Models\Maestros;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class LInicio extends Component
{
  public $cantidadAlumnos, $cantidadMaestros;
  public function render()
  {
    $this->cantidadMaestros =  Maestros::where('Status', 'activo')->count();
    $this->cantidadAlumnos = Alumnos::where('Status', 'activo')->count();

    $reportesPorDia = DB::table('reportes')
      ->select(DB::raw('DATE(created_at) as fecha'), DB::raw('count(*) as total'))
      ->groupBy(DB::raw('DATE(created_at)'))
      ->orderBy('fecha', 'ASC')
      ->get();

    $fechas = $reportesPorDia->pluck('fecha');
    $totales = $reportesPorDia->pluck('total');

    return view('livewire.l-inicio', [
      'fechas' => $fechas,
      'totales' => $totales,
      'cantidadMaestros' => $this->cantidadMaestros,
      'cantidadAlumnos' => $this->cantidadAlumnos
    ]);
  }
}
