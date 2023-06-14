<?php

define('DOCUMENT_ROOT', dirname(__FILE__) . '/../../');
define('REQUEST_URI', $_SERVER['REQUEST_URI']);


// Configuración de la aplicación
define('APP_NAME', 'Mi aplicación');
define('APP_ENVIRONMENT', 'development');

function get_connection()
{
    $servername = "localhost";
    $database = "mantenimientos";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}
