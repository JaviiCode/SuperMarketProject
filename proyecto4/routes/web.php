<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/principal', function () {
    return view('principal');
})->name("principal");




Route::resource('usuarios', UsuarioController::class);
Route::resource('categoria', ProductoController::class);
Route::resource('producto', CategoriaController::class);
Route::post('login', [UsuarioController::class, "login"]);
Route::get('getUsario', [UsuarioController::class, "obtenerUsuario"]);

