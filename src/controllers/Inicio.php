<?php

namespace App\controllers;

use App\lib\Controller;
use App\models\Login as InicioModel;
use App\models\Login;
use App\models\Prueba;

class Inicio extends Controller
{
    protected $inicioModel;
    function __construct()
    {
        parent::__construct();
        $this->inicioModel = new InicioModel();
    }

    public function datosCards()
    {
        //$datos = $this->inicioModel->obtenerDatos();
        $Clase = new Login();
        $datos = $Clase->obtenerDatos();
        
        if ($datos) {
            echo json_encode($datos);
        } else {
            echo json_encode([]);
        }

    }

    function prueba()
    {
        $Clase = new Prueba();
        $Datos = $Clase->obtenerDatos();
        echo json_encode($Datos);
    }
}
