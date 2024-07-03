<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'contrasena', 'rol'];

    /**
     * Verifica las credenciales de inicio de sesión.
     *
     * @param string $email Correo electrónico del usuario.
     * @param string $password Contraseña del usuario.
     * @return array|null Devuelve un array con los datos del usuario si las credenciales son válidas, o NULL si no lo son.
     */
    public function checkCredentials($email, $password)
    {
        // Busca al usuario por su correo electrónico
        $user = $this->where('email', $email)->first();

        // Si se encuentra al usuario y la contraseña coincide, devuelve sus datos, de lo contrario devuelve NULL
        if ($user && password_verify($password, $user['contrasena'])) {
            return $user;
        } else {
            return null;
        }
    }
}
