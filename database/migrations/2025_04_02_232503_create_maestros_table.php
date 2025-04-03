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
    Schema::create('Maestros', function (Blueprint $table) {
      $table->id();
      $table->string('Nombre');
      $table->string('Apellidos');
      $table->string('Usuario');
      $table->string('Password');
      $table->string('Telefono');
      $table->string('Correo');
      $table->enum('Status', ['Activo', 'Inactivo'])->nullable();
      $table->timestamps();
    });
  }
  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('maestros');
  }
};
