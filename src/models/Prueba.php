<?php

namespace App\models;

use App\lib\Model;
use App\lib\Database;

class Prueba extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function obtenerDatos()
    {
        $query = $this->db->conexionDb()->prepare("SELECT * FROM usuarios");
        $query->execute();
        return $query->fetchAll();
    }
}
