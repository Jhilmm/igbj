<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<div class="container container-section">
    <h1 class="h1 text-center">
        DEPARTAMENTOS REGISTRADOS
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-lg" type="search" name="name_depa" id="text" placeholder="MANTENIMIENTO">
        <a class="btn btn-secondary" href="/igbj/registrar_departamento_formulario">Crear</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
            <thead class="table table-success">
                <tr>
                    <th>DEPARTAMENTO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody id="table-body">

            </tbody>
        </table>
    </div>

</div>
</div>
<?php include('app/views/components/footer.php'); ?>