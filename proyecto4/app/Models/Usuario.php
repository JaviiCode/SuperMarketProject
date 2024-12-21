<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    function comprobarUsuario($email, $password)
    {
        $usuario = Usuario::where('email', $email)->first();

        //Añadir esto al if en caso de que sean contraseñas hasheadas " $usuario && Hash::check($password, $usuario->password "
        if ($usuario && $password === $usuario->password) {
            return $usuario;
        }

        return false;
    }

}
