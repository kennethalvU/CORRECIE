<?php

namespace App\models;

use App\lib\Model;
use App\lib\Database;

class Login extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function obtenerDatos()
    {
        $query = $this->db->conexionDb()->prepare("SELECT COUNT(*) AS total_usuarios FROM usuarios");
        $query->execute();
        return $query->fetchAll();
    }
}
