<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function getIndex()
    {
        helper(['form']); 
        return view('login/login');
    }

    public function postAutenticacion()
    {
        helper(['form']);

        $session = session();

        // DATOS DEL FORMULARIO
        $validation = $this->validate([
            'correo' => [
                'label' => 'correo',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'El campo "{field}" es obligatorio.',
                    'valid_email' => 'El campo "{field}" debe ser una dirección de correo electrónico válida.'
                ]
            ],
            'password' => [
                'label' => 'contraseña',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo "{field}" es obligatorio.'
                ]
            ]
        ]);

        if (!$validation) {
            return view('login/login');
        }

        // DATOS DEL FORMULARIO
        $email = $this->request->getPost('correo'); 
        $contrasena = $this->request->getPost('password'); 

        // VALIDO
        $userModel = new LoginModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($contrasena, $user['contrasena'])) {
            // Inicia sesión
            $session->set([
                'id' => $user['id'],
                'nombre' => $user['nombre'],
                'correo' => $user['email'],
                'rol' => $user['rol']
            ]);

            return view('sesion/index');
        } else {
            $session->setFlashdata('error', 'Correo o contraseña incorrecto');
            return redirect()->to(base_url('login'));
        }
    }

    public function postLogout()
    {
        // Cierra la sesión
        $session = session();
        $session->destroy();

        return redirect()->to(base_url(''));
    }
}
