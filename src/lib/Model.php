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

    public function convertir_utf8($array)
    {
        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = mb_convert_encoding($item, 'UTF-8', 'ISO-8859-1'); }});
        return $array;
    }
}