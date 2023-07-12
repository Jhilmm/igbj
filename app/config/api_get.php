<?php
$routes_get = [
    '' => [
        'controller' => 'HomeController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'login' => [
        'controller' => 'AuthController',
        'action' => 'login',
        'methods' => ['GET']
    ],
    'personal' => [
        'controller' => 'PersonnelController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_persona' => [
        'controller' => 'PersonnelController',
        'action' => 'registerPersonView',
        'methods' => ['GET']
    ],
    'actualizar_persona' => [
        'controller' => 'PersonnelController',
        'action' => 'updatePersonView',
        'methods' => ['GET']
    ],
    'asignar_item' => [
        'controller' => 'PersonnelItemController',
        'action' => 'assignItemView',
        'methods' => ['GET']
    ],
    'cambiar_item_asignado' => [
        'controller' => 'PersonnelItemController',
        'action' => 'changeItemView',
        'methods' => ['GET']
    ],
    'asignar_cargo' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'assignPositionView',
        'methods' => ['GET']
    ],
    'actualizar_cargo' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'updatePositionView',
        'methods' => ['GET']
    ],
    'centros_mantenimiento' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_centro_mantenimiento' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'registerCenterView',
        'methods' => ['GET']
    ],
    'actualizar_centro_mantenimiento' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'updateCenterView',
        'methods' => ['GET']
    ],
    'ver_tecnicos_centro_mantenimiento' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'viewTechniciansCenter',
        'methods' => ['GET']
    ],
    'asignar_tecnico' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'viewTechnicianAssignCenter',
        'methods' => ['GET']
    ],
    'asignar_activo' => [
        'controller' => 'AssignAssetController',
        'action' => 'index',
        'methods' => ['GET']
    ],

    #Darwin
    'departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_departamento_formulario' => [
        'controller' => 'DepartamentController',
        'action' => 'registerDepartament',
        'methods' => ['GET']
    ],
    'actualizar_departamento_formulario' => [
        'controller' => 'DepartamentController',
        'action' => 'updateDepartament',
        'methods' => ['GET']
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
        'methods' => ['GET']
    ],
    'registrar_proveedor_formulario' => [
        'controller' => 'ProviderController',
        'action' => 'registerProvider',
        'methods' => ['GET']
    ],
    'actualizar_proveedor_formulario' => [
        'controller' => 'ProviderController',
        'action' => 'updateProvider',
        'methods' => ['GET']
    ], 'habilitar_proveedor' => [
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
        'methods' => ['GET']
    ],
    'registrar_orden_trabajo_formulario' => [
        'controller' => 'WorkOrderController',
        'action' => 'registerWorkOrder',
        'methods' => ['GET']
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
];
