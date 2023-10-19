<?php

namespace App\lib;

use PDO;
use PDOException;
use App\config\Config;

class Database
{
    //** Variables de conexion a MariaDb **//
    private $HostMariaDb;
    private $DbMariaDb;
    private $UserMariaDb;
    private $PasswordMariaDb;
    private $CharsetMariaDb;

    public function __construct()
    {
        $this->DbMariaDb = Config::$DbMariaDb;
        $this->HostMariaDb = Config::$HostMariaDb;
        $this->UserMariaDb = Config::$UserMariaDb;
        $this->CharsetMariaDb = Config::$CharsetMariaDb;
        $this->PasswordMariaDb = Config::$PasswordMariaDb;
    }

    //** Funcion para conectarse a MariaDb **//
    public function conexionDb()
    {
        try {
            $connection = "mysql:host=" . $this->HostMariaDb . ";dbname=" . $this->DbMariaDb . ';charset=' . $this->CharsetMariaDb;
            $options = [
                PDO::ATTR_ERRMODE          => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $pdo = new PDO($connection, $this->UserMariaDb, $this->PasswordMariaDb, $options);

            return $pdo;
        } catch (PDOException $e) {
            throw $e;
            error_log($e);
        }
    }
}
