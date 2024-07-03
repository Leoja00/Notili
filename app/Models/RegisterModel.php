<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contrasena', 'rol'];

    public function obtenerUsuarioPorEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function crearUsuario($datos)
    {
        // Hashea la contraseña antes de guardarla en la base de datos
        $datos['contrasena'] = password_hash($datos['contrasena'], PASSWORD_DEFAULT);

        return $this->insert($datos);
    }
}
