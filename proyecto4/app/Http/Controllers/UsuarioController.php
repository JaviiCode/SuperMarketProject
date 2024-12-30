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
            'email' => 'required',
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
        } else {
            session_start();
            Session::put('Usuario', $usuario->email);


            return response()->json([
                'respuesta' => true,
                'error' => ''
            ]);

        }
    }

    public function obtenerUsuario()
    {
        $usuario = Session::get("Usuario");
        return json_encode(["usuario" => $usuario]);
    }

    public static function usuarioExiste()
    {
        if (Session::has("Usuario")) {
            return true;
        } else {
            return false;
        }
    }
    public function logout(){
        $sesiones = new Usuario();
        session::flush();
        setcookie("XSRF-TOKEN", " ", time() - 1000);
        setcookie("laravel_session", " ", time() - 1000);
        setcookie(session_name(), " ", time()-1000);
        //return json_encode(csrf_token());

    }
}
