<?php
require_once DOCUMENT_ROOT . 'app/controllers/user/AuthController.php';
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
require_once DOCUMENT_ROOT . 'app/controllers/asset/AssetController.php';
require_once DOCUMENT_ROOT . 'app/controllers/post/PostController.php';
require_once DOCUMENT_ROOT . 'app/controllers/catalogue/CatalogueController.php';
require_once DOCUMENT_ROOT . 'app/controllers/catalogue/TaskController.php';
require_once DOCUMENT_ROOT . 'app/controllers/catalogue/SmallTaskController.php';
require_once DOCUMENT_ROOT . 'app/controllers/replacement/ReplacementController.php';

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
    'activo' => [
        'controller' => 'AssetController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_activo' => [
        'controller' => 'AssetController',
        'action' => 'register',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_activo' => [
        'controller' => 'AssetController',
        'action' => 'enable',
        'methods' => ['GET']
    ],
    'deshabilitar_activo' => [
        'controller' => 'AssetController',
        'action' => 'disable',
        'methods' => ['GET']
    ],
    'obtener_clase' => [
        'controller' => 'AssetController',
        'action' => 'get_class',
        'methods' => ['GET']
    ],
    'obtener_marca' => [
        'controller' => 'AssetController',
        'action' => 'get_mark',
        'methods' => ['POST']
    ],
    'obtener_modelo' => [
        'controller' => 'AssetController',
        'action' => 'get_model',
        'methods' => ['POST']
    ],

    'cargo' => [
        'controller' => 'PostController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_cargo' => [
        'controller' => 'PostController',
        'action' => 'register',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_cargo' => [
        'controller' => 'PostController',
        'action' => 'enable',
        'methods' => ['GET']
    ],
    'deshabilitar_cargo' => [
        'controller' => 'PostController',
        'action' => 'disable',
        'methods' => ['GET']
    ],

    'catalogo' => [
        'controller' => 'CatalogueController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_catalogo' => [
        'controller' => 'CatalogueController',
        'action' => 'register',
        'methods' => ['GET', 'POST']
    ],
    'modificar_catalogo' => [
        'controller' => 'CatalogueController',
        'action' => 'update',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_catalogo' => [
        'controller' => 'CatalogueController',
        'action' => 'enable',
        'methods' => ['GET']
    ],
    'deshabilitar_catalogo' => [
        'controller' => 'CatalogueController',
        'action' => 'disable',
        'methods' => ['GET']
    ],


    'repuesto' => [
        'controller' => 'ReplacementController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_repuesto' => [
        'controller' => 'ReplacementController',
        'action' => 'register',
        'methods' => ['GET', 'POST']
    ],
    'actualizar_repuesto' => [
        'controller' => 'ReplacementController',
        'action' => 'update',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_repuesto' => [
        'controller' => 'ReplacementController',
        'action' => 'enable',
        'methods' => ['GET']
    ],
    'deshabilitar_repuesto' => [
        'controller' => 'ReplacementController',
        'action' => 'disable',
        'methods' => ['GET']
    ],

    
    'tarea' => [
        'controller' => 'TaskController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_tarea' => [
        'controller' => 'TaskController',
        'action' => 'register',
        'methods' => ['GET', 'POST']
    ],
    'modificar_tarea' => [
        'controller' => 'TaskController',
        'action' => 'update',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_tarea' => [
        'controller' => 'TaskController',
        'action' => 'enable',
        'methods' => ['GET']
    ],
    'deshabilitar_tarea' => [
        'controller' => 'TaskController',
        'action' => 'disable',
        'methods' => ['GET']
    ],

    'subtarea' => [
        'controller' => 'SmallTaskController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_subtarea' => [
        'controller' => 'SmallTaskController',
        'action' => 'register',
        'methods' => ['GET', 'POST']
    ],
    'modificar_subtarea' => [
        'controller' => 'SmallTaskController',
        'action' => 'update',
        'methods' => ['GET', 'POST']
    ],
    'habilitar_subtarea' => [
        'controller' => 'SmallTaskController',
        'action' => 'enable',
        'methods' => ['GET']
    ],
    'deshabilitar_subtarea' => [
        'controller' => 'SmallTaskController',
        'action' => 'disable',
        'methods' => ['GET']
    ]
];

$routes = array_merge($routes_get, $routes_post, $routes_darwin, $routes_limbert);