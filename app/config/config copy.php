<?php

define('DOCUMENT_ROOT', dirname(__FILE__) . '/../../');
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
define('REQUEST_BODY', file_get_contents('php://input'));

// Configuración de la aplicación
define('APP_NAME', 'Mi aplicación');
define('APP_ENVIRONMENT', 'development');

function get_connection()
{
    $servername = "db";
    $database = "mantenimientos";
    $username = "root";
    $password = "pwdRoot";
    return mysqli_connect($servername, $username, $password, $database);
}
