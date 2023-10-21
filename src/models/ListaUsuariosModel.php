<?php

namespace App\models;

use App\lib\Model;
use App\lib\Database;

class ListaUsuariosModel extends Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function datosTablaUsuarios()
    {
        $query = $this->db->conexionDb()->prepare("SELECT 
                                                        u.nombre AS Nombre,
                                                        u.usuario AS Usuario,
                                                        r.nombre AS Rol,
                                                        d.nombre AS Departamento
                                                    FROM usuarios u
                                                    JOIN roles r ON u.id_rol = r.id_rol
                                                    JOIN departamentos d ON u.id_departamento = d.id_departamento;");
        $query->execute();

        return $this->convertir_utf8($query->fetchAll());
    }
}

