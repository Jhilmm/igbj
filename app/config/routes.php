<?php
require_once DOCUMENT_ROOT . 'app/controllers/HomeController.php';
require_once DOCUMENT_ROOT . 'app/controllers/LoginController.php';
require_once DOCUMENT_ROOT . 'app/controllers/personnel/PersonnelController.php';
require_once DOCUMENT_ROOT . 'app/controllers/personnel/PersonnelItemController.php';
require_once DOCUMENT_ROOT . 'app/controllers/personnel/PersonnelPositionController.php';
require_once DOCUMENT_ROOT . 'app/controllers/maintenance_center/MaintenanceCenterController.php';
require_once DOCUMENT_ROOT . 'app/controllers/assign_assets/AssignAssetController.php';

require_once 'api_get.php';
require_once 'api_post.php';

#Darwin
require_once DOCUMENT_ROOT . 'app/controllers/department/DepartamentController.php';
require_once DOCUMENT_ROOT . 'app/controllers/provider/ProviderController.php';
require_once DOCUMENT_ROOT . 'app/controllers/work_order/WorkOrderController.php';
require_once DOCUMENT_ROOT . 'app/controllers/work_order/WorkOrderItemController.php';

#Limbert
require_once DOCUMENT_ROOT . 'app/controllers/CargoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/RepuestoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/ActivoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/CatalogoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/TareaController.php';
require_once DOCUMENT_ROOT . 'app/controllers/SubtareaController.php';

$routes_darwin = [
    'departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'index',
        'methods' => ['GET', 'POST']
    ],
    'registrar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'registerDepartament',
        'methods' => ['GET', 'POST']
    ],
    'actualizar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'updateDepartament',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'enableDepartament',
        'methods' => ['GET']
    ],
    'deshabilitar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'disableDepartament',
        'methods' => ['GET']
    ],

    'proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'index',
        'methods' => ['GET', 'POST']
    ],
    'registrar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'registerProvider',
        'methods' => ['GET', 'POST']
    ],
    'actualizar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'updateProvider',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'enableProvider',
        'methods' => ['GET']
    ],
    'deshabilitar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'disableProvider',
        'methods' => ['GET']
    ],

    'orden_trabajo' => [
        'controller' => 'WorkOrderController',
        'action' => 'index',
        'methods' => ['GET', 'POST']
    ],
    'registrar_orden_trabajo' => [
        'controller' => 'WorkOrderController',
        'action' => 'registerWorkOrder',
        'methods' => ['GET', 'POST']
    ],
    'reporte_orden_trabajo' => [
        'controller' => 'WorkOrderController',
        'action' => 'reportWorkOrder',
        'methods' => ['GET']
    ],

    'obtener_personal' => [
        'controller' => 'WorkOrderItemController',
        'action' => 'getResponsible',
        'methods' => ['GET']
    ],
    'obtener_activo' => [
        'controller' => 'WorkOrderItemController',
        'action' => 'getActivo',
        'methods' => ['POST']
    ]
];

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

$routes = array_merge($routes_get, $routes_post, $routes_darwin, $routes_limbert);