<?php
require_once DOCUMENT_ROOT . 'app/controllers/HomeController.php';
require_once DOCUMENT_ROOT . 'app/controllers/LoginController.php';
require_once DOCUMENT_ROOT . 'app/controllers/PersonnelController.php';
require_once DOCUMENT_ROOT . 'app/controllers/CargoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/RepuestoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/ActivoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/CatalogoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/TareaController.php';
require_once DOCUMENT_ROOT . 'app/controllers/SubtareaController.php';

$routes = [
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
        'action' => 'searchPersonnel',
        'methods' => ['POST']
    ],
    'registrar_persona' => [
        'controller' => 'PersonnelController',
        'action' => 'registerPerson',
        'methods' => ['GET']
    ],
    'registrar_algo' => [
        'controller' => 'PersonnelController',
        'action' => 'registerPerson',
        'methods' => ['GET']
    ],
    'cargo' => [
        'controller' => 'CargoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_cargo' => [
        'controller' => 'CargoController',
        'action' => 'registerCargo',
        'methods' => ['GET','POST']
    ],

    'repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'register_rep',
        'methods' => ['GET','POST']
    ],
    'actualizar_repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'update',
        'methods' => ['GET','POST']
    ],
    'activo' => [
        'controller' => 'ActivoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_activo' => [
        'controller' => 'ActivoController',
        'action' => 'register_act',
        'methods' => ['GET','POST']
    ],
    'catalogo' => [
        'controller' => 'CatalogoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_catalogo' => [
        'controller' => 'CatalogoController',
        'action' => 'register_cat',
        'methods' => ['GET','POST']
    ],
    'tarea' => [
        'controller' => 'TareaController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'subtarea' => [
        'controller' => 'SubtareaController',
        'action' => 'index',
        'methods' => ['GET']
    ],

];
