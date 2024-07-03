<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function postLogout()
    {
        $session = session();
        $session->destroy(); // Destruir la sesión
        return redirect()->to(base_url('')); // Redirigir al inicio
    }
}
