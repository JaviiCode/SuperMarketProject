<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
})->name("login");

Route::resource('usuarios', UsuarioController::class);
Route::resource('categoria', ProductoController::class);
Route::resource('producto', CategoriaController::class);
