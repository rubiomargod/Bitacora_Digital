<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('App');
});

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
})->name('SALIR');

Route::get('/Login', function () {
  return view('Layouts.Login');
})->name('LOGIN');
