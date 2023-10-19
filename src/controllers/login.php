<?php

namespace App\controllers;

use App\lib\Controller;
use App\models\Login as LoginModel; // Ajustado para usar el modelo Login.

class Login extends Controller
{
    private $loginModel; // Modelo para manejar las operaciones de inicio de sesión.

    function __construct()
    {
        parent::__construct();
        $this->loginModel = new LoginModel(); // Inicializa el modelo.
    }

    public function postLogin()
    {
        $usuario = $_POST['usuario'] ?? null;
        $contraseña = $_POST['contraseña'] ?? null;

        if (!$usuario || !$contraseña) {
            session_start();
            $_SESSION['error'] = "Por favor ingrese un usuario y contraseña.";
            header('Location: login');
            exit;
        }
        $user = $this->loginModel->validateUser($usuario, $contraseña);

        if ($user) {
            // Iniciar sesión y establecer variables de sesión.
            //session_start();
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['id_rol'] = $user['id_rol'];
            $_SESSION['nombre_rol'] = $user['nombre_rol'];
            $_SESSION['id_departamento'] = $user['id_departamento'];

            // Redirige al usuario a la página 'inicio'.
            header('Location: inicio');
            exit; // Es importante llamar a exit() después de una redirección.
        } else {
            session_start();
            // Mostrar un mensaje de error.
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header('Location: login');
            exit;
        }
    }
}