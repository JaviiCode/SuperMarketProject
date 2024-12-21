<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuarioModel = new Usuario();
        //Compruebo el usuario con la funcion del modelo
        $usuario = $usuarioModel->comprobarUsuario($request->email, $request->password);

        //En caso de que sea invalido devuelve un json de un error y en caso contrario inicia la sesion y devuelve un true
        if (!$usuario) {
            return response()->json([
                'respuesta' => false,
                'error' => 'Credenciales incorrectas'
            ]);
        }else{
            session_start();
            Session::put('Usuario', $usuario->email);

            return response()->json([
                'respuesta' => true,
                'error' => ''
            ]);
        }
    }
}
