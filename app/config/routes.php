<?php
require_once DOCUMENT_ROOT . 'app/controllers/HomeController.php';
require_once DOCUMENT_ROOT . 'app/controllers/LoginController.php';
require_once DOCUMENT_ROOT . 'app/controllers/PersonnelController.php';
require_once DOCUMENT_ROOT . 'app/controllers/CargoController.php';
require_once DOCUMENT_ROOT . 'app/controllers/RepuestoController.php';

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
    'repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'index',
        'methods' => ['GET']
    ],
    'registrar_repuesto' => [
        'controller' => 'RepuestoController',
        'action' => 'register_rep',
        'methods' => ['GET']
    ]
];
