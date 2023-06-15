<?php

define('DOCUMENT_ROOT', dirname(__FILE__) . '/../../');
define('REQUEST_URI', $_SERVER['REQUEST_URI']);


// Configuración de la aplicación
define('APP_NAME', 'Mi aplicación');
define('APP_ENVIRONMENT', 'development');

function get_connection()
{
    $servername = "db";
    $database = "mantenimientos";
    $username = "root";
    $password = "pwdRoot";
    try {
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            throw new mysqli_sql_exception(mysqli_connect_error());
        } else {
            return $conn;
        }
    } catch (mysqli_sql_exception $e) {
        echo json_encode(['error' => 'Error en la conexión a la base de datos: ' . $e->getMessage()]);
        return null;
    }
}
get_connection();