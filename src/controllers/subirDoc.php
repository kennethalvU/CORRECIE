<?php
namespace App\controllers;

use App\lib\Controller;
use App\models\subirDocModel;

class SubirDoc extends Controller
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new subirDocModel();
    }

    public function cargarRoles()
    {

        $roles = $this->model->obtenerRoles();
        $this->view->render('subirDoc/index', ['roles' => $roles]);

    }
}

