<?php

namespace App\lib;

use App\lib\View;

class Controller
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    #Funcion utilizada para renderizar las vistas
    public function render($name, $data = [])
    {
        $this->view->render($name, $data);
    }

    #Funcion utilizada para extraer parametros POST
    protected function post($param)
    {
        error_log("ExistPOST: No existe el parametro $param");
        if (!isset($_POST[$param])) {
            return NULL;
        }

        return $_POST[$param];
    }

    #Funcion utilizada para obtener parametros GET
    protected function get($param)
    {
        error_log("ExistGet: No existe el parametro $param");
        if (!isset($_GET[$param])) {
            return NULL;
        }

        return $_GET[$param];
    }

    #Funcion utilizada para obtener archivos
    public function file($param)
    {
        if (!isset($_FILES[$param])) {
            error_log("ExistFile: No existe el parametro $param");
            return NULL;
        }

        return $_FILES[$param];
    }
}
