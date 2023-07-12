<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<div class="container container-section">
    <h1 class="h1 text-center">
        PROVEEDORES REGISTRADOS
    </h1>

    <!--Buscador-->
    <div class="d-flex justify-content-between">
        <input class="form-control-lg" type="search" name="name_pro" id="text" placeholder="PROVEEDOR">
        <a class="btn btn-secondary" href="/igbj/registrar_proveedor_formulario">Crear</a>
    </div>

    <!--Tabla de datos-->
    <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
            <thead class="table-success">
                <tr>
                    <th>NIT</th>
                    <th>PROVEEDOR</th>
                    <th>DIRECCIÓN</th>
                    <th>TELEFONO</th>
                    <th>CONTACTO</th>
                    <th>CELULAR</th>
                    <th>CORREO</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
        </table>
    </div>
</div>

<?php include('app/views/components/footer.php'); ?>