<?php

namespace App\controllers;

use App\lib\Controller;
use App\models\BuscarDocModel;

class BuscarDoc extends Controller
{

    private $listarDocsModel;

    function __construct()
    {
        parent::__construct();
        $this->listarDocsModel = new BuscarDocModel;

    }

    public function llenarTablaDoc()
    {
        $datos = json_encode($this->listarDocsModel->datosTablaDocs());

        echo $datos;

    }

}
