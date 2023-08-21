<?php
require_once DOCUMENT_ROOT . 'app/controllers/user/AuthController.php';
require_once DOCUMENT_ROOT . 'app/controllers/HomeController.php';
require_once DOCUMENT_ROOT . 'app/controllers/LoginController.php';
require_once DOCUMENT_ROOT . 'app/controllers/personnel/PersonnelController.php';
require_once DOCUMENT_ROOT . 'app/controllers/personnel/PersonnelItemController.php';
require_once DOCUMENT_ROOT . 'app/controllers/personnel/PersonnelPositionController.php';
require_once DOCUMENT_ROOT . 'app/controllers/maintenance_center/MaintenanceCenterController.php';
require_once DOCUMENT_ROOT . 'app/controllers/assign_assets/AssignAssetController.php';
require_once DOCUMENT_ROOT . 'app/controllers/department/DepartamentController.php';
require_once DOCUMENT_ROOT . 'app/controllers/provider/ProviderController.php';
require_once DOCUMENT_ROOT . 'app/controllers/work_order/WorkOrderController.php';
require_once DOCUMENT_ROOT . 'app/controllers/work_order/WorkOrderItemController.php';
require_once DOCUMENT_ROOT . 'app/controllers/maintenance_schedule/MaintenanceScheduleController.php';

require_once 'api_get.php';
require_once 'api_post.php';

#Limbert
require_once DOCUMENT_ROOT . 'app/controllers/CargoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/RepuestoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/ActivoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/CatalogoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/TareaController.php';
require_once DOCUMENT_ROOT . 'app/controllers/SubtareaController.php';

$routes_limbert = [
    'cargo' => [
        'controller' => 'CargoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_cargo' => [
        'controller' => 'CargoController',
        'action' => 'registerCargo',
        'methods' => ['GET', 'POST']
    ],

    'repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'register_rep',
        'methods' => ['GET', 'POST']
    ],
    'actualizar_repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'update',
        'methods' => ['GET', 'POST']
    ],
    'activo' => [
        'controller' => 'ActivoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_activo' => [
        'controller' => 'ActivoController',
        'action' => 'register_act',
        'methods' => ['GET', 'POST']
    ],
    'catalogo' => [
        'controller' => 'CatalogoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_catalogo' => [
        'controller' => 'CatalogoController',
        'action' => 'register_cat',
        'methods' => ['GET', 'POST']
    ],
    'modificar_catalogo' => [
        'controller' => 'CatalogoController',
        'action' => 'update',
        'methods' => ['GET', 'POST']
    ],
    'tarea' => [
        'controller' => 'TareaController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_tarea' => [
        'controller' => 'TareaController',
        'action' => 'register_tar',
        'methods' => ['GET', 'POST']
    ],
    'subtarea' => [
        'controller' => 'SubtareaController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_subtarea' => [
        'controller' => 'SubtareaController',
        'action' => 'register_sub',
        'methods' => ['GET', 'POST']
    ],
];

$routes = array_merge($routes_get, $routes_post, $routes_limbert);
