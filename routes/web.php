<?php

use Illuminate\Support\Facades\Route;

$Role = session('ROLE');

Route::get('/', function () {
  return view('App');
});

Route::get('/Reportes', function () {
  return view('Layouts.Reportes.Reportes');
})->name('REPORTES');

Route::get('/Login', function () {
  session(['ROLE' => '']); // Limpiar el rol de la sesión
  return view('Layouts.Login');
})->name('SALIR');

// Si el rol no es 'User', redirigir al login
Route::get('/Login', function () {
  return view('Layouts.Login');
})->name('LOGIN');
