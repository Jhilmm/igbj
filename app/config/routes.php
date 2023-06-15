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

require_once DOCUMENT_ROOT . 'app/controllers/department/DepartamentController.php';
require_once DOCUMENT_ROOT . 'app/controllers/provider/ProviderController.php';
require_once DOCUMENT_ROOT . 'app/controllers/work_order/WorkOrderController.php';
require_once DOCUMENT_ROOT . 'app/controllers/work_order/WorkOrderItemController.php';


$routes_darwin = [
    '' => [
        'controller' => 'HomeController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'login' => [
        'controller' => 'LoginController',
        'action' => 'showLoginForm',
        'methods' => ['GET']
    ],
    'datos' => [
        'controller' => 'LoginController',
        'action' => 'datos',
        'methods' => ['POST']
    ],
    'personal' => [
        'controller' => 'PersonnelController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'person_search' => [
        'controller' => 'PersonnelController',
        'action' => 'searchPerson',
        'methods' => ['POST']
    ],
    'registrar_persona' => [
        'controller' => 'PersonnelController',
        'action' => 'registerPerson',
        'methods' => ['GET']
    ],

    'departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'index',
        'methods' => ['GET','POST']
    ],
    'registrar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'registerDepartament',
        'methods' => ['GET','POST']
    ],
    'actualizar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'updateDepartament',
        'methods' => ['GET','POST']
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
        'methods' => ['GET','POST']
    ],    
    'registrar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'registerProvider',
        'methods' => ['GET','POST']
    ],
    'actualizar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'updateProvider',
        'methods' => ['GET','POST']
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
        'methods' => ['GET','POST']
    ],
    'registrar_orden_trabajo' => [
        'controller' => 'WorkOrderController',
        'action' => 'registerWorkOrder',
        'methods' => ['GET','POST']
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

$routes = array_merge($routes_get, $routes_post, $routes_darwin);