<?php
namespace App\controllers;

use App\lib\Controller;
use App\models\ListaUsuariosModel;

class ListaUsuarios extends Controller
{

    private $listarUsuariosModel;

    function __construct()
    {
        parent::__construct();
        
        $this->listarUsuariosModel = new ListaUsuariosModel;
        
    }

    public function llenarTabla()
    {
        
        $datos = json_encode($this->listarUsuariosModel->datosTablaUsuarios());

        echo $datos;

    }
}
