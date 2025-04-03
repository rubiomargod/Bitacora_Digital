<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('Alumnos', function (Blueprint $table) {
      $table->id();
      $table->string('Nombre');
      $table->string('Apellidos');
      $table->string('Grado');
      $table->string('Grupo');
      $table->enum('Status', ['Activo', 'Inactivo'])->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('alumnos');
  }
};
