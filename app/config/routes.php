<?php
require_once DOCUMENT_ROOT . 'app/controllers/HomeController.php';
require_once DOCUMENT_ROOT . 'app/controllers/LoginController.php';
require_once DOCUMENT_ROOT . 'app/controllers/PersonnelController.php';

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
        'action' => 'searchPerson',
        'methods' => ['POST']
    ],
    'registrar_persona' => [
        'controller' => 'PersonnelController',
        'action' => 'registerPerson',
        'methods' => ['GET']
    ]
];
