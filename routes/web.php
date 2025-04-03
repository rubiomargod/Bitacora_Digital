<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('App');
});
Route::get('/Reportes', function () {
  return view('Layouts.Reportes');
})->name('REPORTES');
