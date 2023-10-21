<?php

namespace App\models;

use App\lib\Model;
use App\lib\Database;

class BuscarDocModel extends Model {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function datosTablaDocs()
    {
        $query = $this->db->conexionDb()->prepare("SELECT d.tipo_doc AS tipoDoc, 
                                                          d.descripcion_doc AS descripcionDoc, 
                                                          d.fecha AS fechaDoc, 
                                                          d.destino AS destinoDoc, 
                                                          CONCAT('Folder ', d.folder, ' Caja ', d.caja) AS ubicacionDoc, 
                                                          CONCAT(d.no_folio, ' Folio') AS observacionesDoc,
                                                          d.ruta_doc AS rutaDoc
                                                   FROM documentos d;");
        $query->execute();

        return $this->convertir_utf8($query->fetchAll());
    }
}