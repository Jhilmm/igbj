<?php
$routes_get = [
    '' => [
        'controller' => 'HomeController',
        'action' => 'index',
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
];