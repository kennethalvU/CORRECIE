<?php

namespace App\models;

use App\lib\Model;
use App\lib\Database;

class subirDocModel extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function obtenerRoles()
    {
        $query = $this->db->conexionDb()->prepare("SELECT id_rol, nombre FROM roles");
        $query->execute();
        return $query->fetchAll();
    }
}