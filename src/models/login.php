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
    public function validateUser($usuario, $contraseña)
    {
        //$query = $this->db->conexionDb()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $query = $this->db->conexionDb()->prepare("SELECT us.id_usuario, us.usuario, us.nombre, us.contraseña, rl.id_rol, rl.nombre AS nombre_rol, dp.id_departamento, dp.nombre AS nombre_departamento FROM usuarios AS us
                                                   INNER JOIN roles AS rl
                                                   ON us.id_rol = rl.id_rol
                                                   INNER JOIN departamentos AS dp
                                                   ON us.id_departamento = dp.id_departamento
                                                   WHERE usuario = :usuario");
        $query->bindParam(':usuario', $usuario);
        $query->execute();

        $user = $query->fetch();

       /* if ($user && password_verify($contraseña, $user['contraseña'])) {
            return $user;
        }*/
        if ($user && $contraseña == $user['contraseña']) {
            return $user;
        }

        return false;
    }


}