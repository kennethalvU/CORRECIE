<?php

define('ENTORNO_FTP', 'PRODUCCION'); //PRODUCCION O DESARROLLO
define('SERVIDOR_FTP', 'AQUI VA LA IP'); //IP DEL SERVIDOR FTP
define('TIEMPO_ESPERA_FTP', 10); //TIEMPO DE ESPERA PARA LA CONEXION FTP
//Clase para gestionar la conexion con el servidor FTP
class ftp
{
    private $Servidor;
    private $Usuario;
    private $Clave;
    private $Puerto;
    private $TiempoEspera;
    private $Conexion;

    //Se envia al constructor el nombre del servicio que se va a utilizar
    public function __construct()
    {

        if (ENTORNO_FTP == 'PRODUCCION') {
            $Usuario = 'portalWeb';
            $Clave = 'P0rt@lW3b4843';
            $Puerto = '21';
        }

        if (ENTORNO_FTP == 'DESARROLLO') {
            $Usuario = 'portalWebDev';
            $Clave = 'P0rt@lW3b4843';
            $Puerto = '41';
        }

        $this->Servidor = SERVIDOR_FTP;
        $this->Usuario = $Usuario;
        $this->Clave = $Clave;
        $this->Puerto = $Puerto;
        $this->TiempoEspera = TIEMPO_ESPERA_FTP;
        $this->Conectar();
    }

    //Levanta la conexion con el servidor FTP
    public function Conectar()
    {
        $this->Conexion = ftp_connect($this->Servidor, $this->Puerto, $this->TiempoEspera);
        if ($this->Conexion) {
            if (ftp_login($this->Conexion, $this->Usuario, $this->Clave)) {
                ftp_pasv($this->Conexion, true);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Cambia el directorio de trabajo FTP
    private function cambiarDirectorio($ruta)
    {
        if (ftp_chdir($this->Conexion, $ruta)) {
            return true;
        } else {
            return false;
        }

        ftp_close($this->Conexion);
    }

    //Verifica si existe un archivo en el servidor FTP se envia la ruta y el nombre del archivo
    public function ExisteArchivo($ruta, $nombre)
    {
        if ($ruta != '') {
            $Directorio = $this->cambiarDirectorio($ruta);
        } else {
            $Directorio = $this->cambiarDirectorio('~');
        }
        if ($Directorio) {
            $lista = ftp_nlist($this->Conexion, '.');
            if (in_array($nombre, $lista)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        ftp_close($this->Conexion);
    }

    //Crea una carpeta en el servidor FTP antes de crear la carpeta se cambia al directorio raiz
    public function nuevaCarpeta($nombre)
    {
        $this->cambiarDirectorio('~');
        if (ftp_mkdir($this->Conexion, $nombre)) {
            return true;
        } else {
            return false;
        }

        ftp_close($this->Conexion);
    }

    //Sube un archivo al servidor FTP antes de subir el archivo se cambia al directorio raiz
    public function subirArchivo($rutaLocal, $rutaRemota)
    {
        $this->cambiarDirectorio('~');
        if (ftp_put($this->Conexion, $rutaRemota, $rutaLocal, FTP_BINARY)) {
            return true;
        } else {
            return false;
        }

        ftp_close($this->Conexion);
    }

    //Obtiene un archivo del servidor FTP antes de obtener el archivo se cambia al directorio raiz
    public function obtenerArchivo($Ruta)
    {
        $this->cambiarDirectorio('~');
        $Archivo = tempnam(sys_get_temp_dir(), "ftp");
        if (ftp_get($this->Conexion, $Archivo, $Ruta, FTP_BINARY)) {
            return base64_encode(file_get_contents($Archivo));
        } else {
            return false;
        }

        ftp_close($this->Conexion);
        unlink($Archivo);
    }

    //Lista todos los archivos de un directorio en el servidor FTP
    public function listarArchivos($ruta)
    {

        $this->cambiarDirectorio($ruta);
        $Contenido = ftp_nlist($this->Conexion, '.');
        $Archivos = array();

        foreach ($Contenido as $Cont) {
            if (ftp_size($this->Conexion, $Cont) >= 0) {
                $Archivos[] = $Cont;
            }
        }
        return $Archivos;
        ftp_close($this->Conexion);
    }
}
