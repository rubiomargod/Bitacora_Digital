<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;

Route::get('/Home', function () {
  if (!session()->has('ROLE')) {
    return redirect()->route('LOGIN');
  }

  return view('Layouts.Inicio');
})->name('/Inicio');

Route::get('/', function () {
  return view('Layouts.Login');
})->name('LOGIN');

Route::get('/Reportes', function () {
  if (!session()->has('ROLE')) {
    return redirect()->route('LOGIN');
  }

  return view('Layouts.Reportes.Reportes');
})->name('REPORTES');

Route::get('/Alumnos', function () {
  if (!session()->has('ROLE')) {
    return redirect()->route('LOGIN');
  }

  return view('Layouts.Alumnos.Alumnos');
})->name('ALUMNOS');

Route::get('/Maestros', function () {
  if (!session()->has('ROLE')) {
    return redirect()->route('LOGIN');
  }

  return view('Layouts.Maestros.Maestros');
})->name('MAESTROS');

Route::get('/logout', function () {
  session()->flush();
  return redirect()->route('LOGIN');
})->name('LOGOUT');

Route::get('/password/resetform', [PasswordController::class, 'showResetForm'])->name('password.resetform');
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');
