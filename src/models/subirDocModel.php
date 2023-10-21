<?php

namespace App\models;

use App\lib\Model;
use App\lib\Database;
use PDOException;

class subirDocModel extends Model
{
    private $db;
    private $Departamento;
    private $TipoDoc;
    private $Descripcion;
    private $Fecha;
    private $Destino;
    private $Folder;
    private $Caja;
    private $Observaciones;
    private $Ruta;
    private $Archivo;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function subirDoc()
    {
        $target_dir = "public/documents/";
        $target_file = $target_dir . basename($this->Archivo["name"]);
        $uploadOk = 1;
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verifica si el archivo ya fue subido
        if (file_exists($target_file)) {
            $uploadOk = 1;
        }

        // Verifica el tamaño del archivo
        if ($this->Archivo["size"] > 5000000) {
            return "size";
        } else {
            $uploadOk = 0;
        }

        // Permite ciertos formatos de archivo
        if ($extension != "pdf" && $extension != "doc" && $extension != "docx") {
            return "ext";
        } else {
            $uploadOk = 0;
        }

        // Verifica si $uploadOk está establecido en 0 por un error anterior
        

        if ($uploadOk == 0) {
            $target_file = $target_dir . time() . " " . basename($this->Archivo["name"]);
            $this->Ruta = $target_file;
            if (move_uploaded_file($this->Archivo["tmp_name"], $target_file)) {
                $InserData = $this->insertDataDoc();
                if($InserData['id_salida'] == 1){
                    return true;
                }else{
                    unlink($target_file);
                    return false;
                }
            } else {
                return false;
            }
            // Si todo está bien, intenta subir el archivo
        } else {
            $this->Ruta = $target_file;
            if (move_uploaded_file($this->Archivo["tmp_name"], $target_file)) {
                $InserData = $this->insertDataDoc();
                if($InserData['id_salida'] == 1){
                    return true;
                }else{
                    unlink($target_file);
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    private function insertDataDoc(){
        try{
            $query = $this->db->conexionDb()->prepare("CALL SP_INSERT_INFO_DOC(:id_departamento, :tipoDoc, :descripcion, :fecha, :destino, :folder, :caja, :observaciones, :ruta)");
            $query->execute([
                'id_departamento' => $this->Departamento,
                'tipoDoc' => $this->TipoDoc,
                'descripcion' => $this->Descripcion,
                'fecha' => $this->Fecha,
                'destino' => $this->Destino,
                'folder' => $this->Folder,
                'caja' => $this->Caja,
                'observaciones' => $this->Observaciones,
                'ruta' => $this->Ruta
            ]);
            return var_dump($query->errorInfo());
        }catch(PDOException $e){
            error_log($e->getMessage());
        }
    }

    public function llenarSelectDepartamento()
    {
        $query = $this->db->conexionDb()->prepare("SELECT id_departamento, nombre FROM departamentos;");
        $query->execute();

        return $this->convertir_utf8($query->fetchAll());
    }

    public function getDepartamento()
    {
        return $this->Departamento;
    }
    public function setDepartamento($Departamento)
    {
        $this->Departamento = $Departamento;
    }
    public function getTipoDoc()
    {
        return $this->TipoDoc;
    }
    public function setTipoDoc($TipoDoc)
    {
        $this->TipoDoc = $TipoDoc;
    }
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }
    public function getFecha()
    {
        return $this->Fecha;
    }
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }
    public function getDestino()
    {
        return $this->Destino;
    }
    public function setDestino($Destino)
    {
        $this->Destino = $Destino;
    }
    public function getFolder()
    {
        return $this->Folder;
    }
    public function setFolder($Folder)
    {
        $this->Folder = $Folder;
    }
    public function getCaja()
    {
        return $this->Caja;
    }
    public function setCaja($Caja)
    {
        $this->Caja = $Caja;
    }
    public function getObservaciones()
    {
        return $this->Observaciones;
    }
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;
    }
    public function getRuta()
    {
        return $this->Ruta;
    }
    public function setRuta($Ruta)
    {
        $this->Ruta = $Ruta;
    }
    public function getArchivo()
    {
        return $this->Archivo;
    }
    public function setArchivo($Archivo)
    {
        $this->Archivo = $Archivo;
    }
}