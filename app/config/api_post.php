<?php

$routes_post = [
    'authenticate' => [
        'controller' => 'AuthController',
        'action' => 'authenticate',
        'methods' => ['POST']
    ],
    'personnel_search' => [
        'controller' => 'PersonnelController',
        'action' => 'searchPersonnel',
        'methods' => ['POST']
    ],
    'person_search' => [
        'controller' => 'PersonnelController',
        'action' => 'searchPerson',
        'methods' => ['POST']
    ],
    'register_person' => [
        'controller' => 'PersonnelController',
        'action' => 'registerPerson',
        'methods' => ['POST']
    ],
    'update_person' => [
        'controller' => 'PersonnelController',
        'action' => 'updatePerson',
        'methods' => ['POST']
    ],
    'get_all_professions' => [
        'controller' => 'PersonnelController',
        'action' => 'get_all_professions',
        'methods' => ['POST']
    ],
    'get_all_items' => [
        'controller' => 'PersonnelItemController',
        'action' => 'get_all_items',
        'methods' => ['POST']
    ],
    'assign_item' => [
        'controller' => 'PersonnelItemController',
        'action' => 'assignItem',
        'methods' => ['POST']
    ],
    'update_item_assigned' => [
        'controller' => 'PersonnelItemController',
        'action' => 'updateItemAssigned',
        'methods' => ['POST']
    ],
    'has_item_assigned' => [
        'controller' => 'PersonnelItemController',
        'action' => 'hasItemAssigned',
        'methods' => ['POST']
    ],
    'assign_position' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'assignPosition',
        'methods' => ['POST']
    ],
    'update_position_assigned' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'updatePositionAssigned',
        'methods' => ['POST']
    ],
    'has_position_assigned' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'hasPositionAssigned',
        'methods' => ['POST']
    ],
    'get_all_position' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'get_all_position',
        'methods' => ['POST']
    ],
    'personnel_position_search' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'searchPosition',
        'methods' => ['POST']
    ],
    'get_all_departments' => [
        'controller' => 'PersonnelPositionController',
        'action' => 'get_all_departments',
        'methods' => ['POST']
    ],
    'maintenance_center_search' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'searchMaintenanceCenter',
        'methods' => ['POST']
    ],
    'maintenance_center_enable_disable' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'enableDisableMaintenanceCenter',
        'methods' => ['POST']
    ],
    'maintenance_center_register' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'actionRegisterCenter',
        'methods' => ['POST']
    ],
    'maintenance_center_search_for_update' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'actionSearchCenter',
        'methods' => ['POST']
    ],
    'maintenance_center_update' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'actionUpdateCenter',
        'methods' => ['POST']
    ],
    'technician_center_search' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'actionSearchTechnicianCenter',
        'methods' => ['POST']
    ],
    'technician_center_enable_disable' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'enableDisableTechnicianCenter',
        'methods' => ['POST']
    ],
    'technician_assign_search' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'actionAssignSearchTechnician',
        'methods' => ['POST']
    ],
    'assign_technician_center' => [
        'controller' => 'MaintenanceCenterController',
        'action' => 'actionAssignTechnician',
        'methods' => ['POST']
    ],
    'search_responsible_personnel_with_asset_assignment' => [
        'controller' => 'AssignAssetController',
        'action' => 'searchResponsiblePersonnelWithAssetAssignment',
        'methods' => ['POST']
    ],
    'search_assigned_assets' => [
        'controller' => 'AssignAssetController',
        'action' => 'searchAssignedAssets',
        'methods' => ['POST']
    ],

    #Darwin
    'departamento_search' => [
        'controller' => 'DepartamentController',
        'action' => 'search',
        'methods' => ['POST']
    ],
    'registrar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'registerDepartament',
        'methods' => ['POST']
    ],
    'actualizar_departamento' => [
        'controller' => 'DepartamentController',
        'action' => 'updateDepartament',
        'methods' => ['POST']
    ],
    'proveedor_search' => [
        'controller' => 'ProviderController',
        'action' => 'search',
        'methods' => ['POST']
    ],
    'registrar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'registerProvider',
        'methods' => ['POST']
    ],
    'actualizar_proveedor' => [
        'controller' => 'ProviderController',
        'action' => 'updateProvider',
        'methods' => ['POST']
    ],
    'orden_trabajo_search' => [
        'controller' => 'WorkOrderController',
        'action' => 'index',
        'methods' => ['POST']
    ],
    'registrar_orden_trabajo' => [
        'controller' => 'WorkOrderController',
        'action' => 'registerWorkOrder',
        'methods' => ['POST']
    ],
    'obtener_activo' => [
        'controller' => 'WorkOrderItemController',
        'action' => 'getActivo',
        'methods' => ['POST']
    ]
];
