<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
  return view('Layouts.Inicio');
})->name('/');

Route::get('/Reportes', function () {
  return view('Layouts.Reportes.Reportes');
})->name('REPORTES');

Route::get('/Alumnos', function () {
  return view('Layouts.Alumnos.Alumnos');
})->name('ALUMNOS');

Route::get('/Maestros', function () {
  return view('Layouts.Maestros.Maestros');
})->name('MAESTROS');

Route::get('/Login', function () {
  session(['ROLE' => '']);
  return view('Layouts.Login');
})->name('LOGIN');

Route::get('/password/resetform', [PasswordController::class, 'showResetForm'])->name('password.resetform');

Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
