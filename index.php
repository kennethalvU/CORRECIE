<?php

/* Linea para definir la zona horaria */
ini_set('date.timezone', 'America/Guatemala');

/* Linea para mostrar todos los errores de php */
error_reporting(E_ALL);

/* Linea para ignorar errores repetidos */
ini_set('ignore_repeated_errors', TRUE);

/* Linea para no mostrar los errores en pantalla */
ini_set('display_errors', TRUE);

/* Linea para habilitar el log de errores */
ini_set('log_errors', TRUE);

/* Linea para indicar la ruta del archivo de log de errores */
ini_set("error_log", "logs/php-error.log");

error_log("Inicio de la aplicacion");
require_once 'vendor/autoload.php';
require_once 'src/lib/Routes.php';
