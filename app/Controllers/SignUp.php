<?php

namespace App\Controllers;

use App\Models\RegisterModel;

class SignUp extends BaseController
{
    public function getIndex()
    {
        helper(['form']);
        return view('registro/register');
    }

    public function postRegistrar()
    {
        helper(['form']);

        // Validar campos
        $validation = $this->validate([
            'nombre' => [
                'label' => 'nombre',
                'rules' => 'required|alpha',
                'errors' => [
                    'required' => 'El campo "{field}" es obligatorio.',
                    'alpha' => 'El campo "{field}" solo puede contener letras.',
                ],
            ],
            
            'correo' => [
                'label' => 'correo',
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_email' => 'El campo "{field}" no es correcto.',
                    'is_unique' => 'Correo ya existente']
                ],        
            'contrasena' => [
                'label' => 'contrasena',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'El campo "{field}" es obligatorio.',
                    'min_length'=>'El campo {field} no puede tener menos de 8 caracteres.'],
            ],
            'confirmar_contrasena' => [
                'label' => 'confirmar_contrasena',
                'rules' => 'required|matches[contrasena]',
                'errors' => [
                    'required'=>'El campo "confirmar contraseña" es obligatorio.',
                    'matches' => 'Las contraseñas no coinciden.'],
            ]
            
        ]);

        // Si hay errores
        if (!$validation) {
            return view('registro/register');
        }

        // Si no hay errores
        $nombre = $this->request->getPost('nombre');
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');
        $rol = $this->request->getPost('rol');

        // Hashear la contraseña
        $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

        $usuarioModel = new RegisterModel();

        $datosUsuario = [
            'nombre' => $nombre,
            'email' => $correo,
            'contrasena' => $contrasenaHasheada, // Utilizar la contraseña hasheada
            'rol' => $rol
        ];

        // Agregar los datos a la BD
        $usuarioModel->insert($datosUsuario);

        // Iniciar sesión
        $session = session();
        $session->set('nombre', $nombre);
        $session->set('correo', $correo);
        $session->set('rol', $rol);
        

        return view('sesion/index', ['nombre' => $nombre]); // Pasar el nombre a la vista
    }
}
