<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


    <!-- Enlaces de hojas de estilo -->
    <link rel="stylesheet" href="<?php DOCUMENT_ROOT; ?>public/styles/styles.css">
    <link rel="stylesheet" href="<?php DOCUMENT_ROOT; ?>public/styles/header.css">
    <link rel="stylesheet" href="<?php DOCUMENT_ROOT; ?>public/styles/footer.css">
    <!-- <link rel="stylesheet" href="<?php DOCUMENT_ROOT; ?>public/styles/foote.css">
    <link rel="stylesheet" href="<?php DOCUMENT_ROOT; ?>public/styles/table.css"> -->

    <title>Registro de Equipos </title>
</head>


<body>
    <header>
        <a class="btn btn-primary open-menu">
            <i class="fas fa-align-left"></i>
        </a>
        <h1 class="h7 text-center mx-auto nombre">
            SISTEMA DE REGISTROS Y MANTENIMIENTOS I.G.B.J.
        </h1>
    </header>
    <nav class="sidebar">
        <div class="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="logo">
            <a href="/igbj">
                <img src="/igbj/img/logo.png" alt="logo dep">
            </a>
        </div>

        <ul class="list-unstyled menu-elements">

            <li class="active">
                <a class="dropdown-item" href="/igbj/activo">Activos</a>
            </li>
            <li class="active">
                <a class="dropdown-item" href="/igbj/asignar_activo">Asignar Activos</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj/catalogo">Catálogos</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj_mantenimientos/includes/cargos/cargo_view.php">Cargos</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj/centros_mantenimiento">Centros de Mantenimiento</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj/departamento">Departamentos</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj/personal">Personas</a>
            </li>


            <li>
                <a class="dropdown-item" href="/igbj/proveedor">Proveedores</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj_mantenimientos/includes/repuestos/repuesto_view.php">Repuestos</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj/orden_trabajo">Ordenes de trabajo</a>
            </li>
            <li>
                <a class="dropdown-item" href="/igbj/cronograma_mantenimiento">Cronograma de mantenimientos</a>
            </li>
        </ul>
    </nav>

    <div class="overlay"></div>