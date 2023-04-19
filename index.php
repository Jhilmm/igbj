<?php
require_once('app/config/config.php');
require_once('app/config/routes.php');

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = str_replace(DOCUMENT_ROOT, '', $requestUri);


$url = parse_url($requestUri, PHP_URL_PATH);
$pathParts = explode('/', $url);
$path = end($pathParts);
$path = trim($path, '/');

$requestMethod = $_SERVER['REQUEST_METHOD'];

$route = $routes[$path] ?? null;
if (!$route) {
    echo "Error 404: página no encontrada";
    exit;
}

$controllerName = $route['controller'];
$actionName = $route['action'];
$controller = new $controllerName();

if (!in_array($requestMethod, $route['methods'])) {
    echo "Error 405: método no permitido";
    exit;
}

if ($requestMethod == 'GET') {
    $controller->$actionName();
} else if ($requestMethod == 'POST') {
    $postData = $_POST;
    $controller->$actionName($postData);
}
