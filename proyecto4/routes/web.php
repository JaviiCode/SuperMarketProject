<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/', function () {
    if(UsuarioController::usuarioExiste()){return view('principal');}else{return redirect()->route('login');}
})->name("principal");




Route::resource('usuarios', UsuarioController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('producto', CategoriaController::class);
Route::post('login', [UsuarioController::class, "login"]);
Route::get('LogOut', [UsuarioController::class, 'logout']);
Route::get('getUsario', [UsuarioController::class, "obtenerUsuario"]);


