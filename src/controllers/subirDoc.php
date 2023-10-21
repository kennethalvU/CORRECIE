<?php
namespace App\controllers;

use App\lib\Controller;
use App\models\subirDocModel;


class SubirDoc extends Controller
{  

    function __construct()
    {
        parent::__construct();

    }

    public function subirDoc()
    {
        $Model = new subirDocModel();
        $Departamento = $this->post('departamento');
        $TipoDoc = $this->post('tipoDoc');
        $Descripcion = $this->post('descripcion');
        $Fecha = $this->post('fecha');
        $Destino = $this->post('destino');
        $Folder = $this->post('folder');
        $Caja = $this->post('caja');
        $Observaciones = $this->post('observaciones');
        $Archivo = $this->file("archivo");

        $Model->setArchivo($Archivo);
        $Model->setDepartamento($Departamento);
        $Model->setTipoDoc($TipoDoc);
        $Model->setDescripcion($Descripcion);
        $Model->setFecha($Fecha);
        $Model->setDestino($Destino);
        $Model->setFolder($Folder);
        $Model->setCaja($Caja);
        $Model->setObservaciones($Observaciones);
        $SubirDoc = $Model->subirDoc();

        if($SubirDoc == true){
            //No existio nigun error en la subida de archivo ni en la insercion de datos
            echo json_encode(array("error" => 0));
        }else if($SubirDoc == "size"){
            //El tamaño del archivo sobre pasa el limite establecido
            echo json_encode(array("error" => 1));
        }else if($SubirDoc == "ext"){
            //La extension del archivo no es valida
            echo json_encode(array("error" => 2));
        }else{
            //Ocurrio un error al subir el archivo o al insertar los datos
            echo json_encode(array("error" => 3));
        }
        
    }

    public function llenarSelectDepartamento()
    {
        $Model = new subirDocModel();
        $Departamentos = $Model->llenarSelectDepartamento();
        echo json_encode($Departamentos);
    }

}

