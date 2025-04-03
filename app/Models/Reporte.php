<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
  protected $fillable = ['FKIDMaestro', 'FKIDAlumno', 'Motivos', 'Descripción', 'Status'];
  public $timestamps = true;
}
