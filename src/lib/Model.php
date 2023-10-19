<?php

namespace App\lib;

use App\lib\Database;

class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    //** Funcion para realizar queries a MariaDb sin parametros **//
    public function queryMariaDb($query)
    {
        return $this->db->conexionDb()->query($query);
    }

    //** Funcion para realizar querie preparados a MariaDb con parametros **//
    public function prepareMariaDb($query)
    {
        return $this->db->conexionDb()->prepare($query);
    }
}
