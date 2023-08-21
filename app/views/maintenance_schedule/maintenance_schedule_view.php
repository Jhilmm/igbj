<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<div class="container container-section">
    <h1 class="h1 text-center">
        CRONOGRAMA DE MANTENIMIENTOS PREVENTIVOS
    </h1>
    <div class="d-flex justify-content-between" id="schedule">
        <div class="form-group schedule">
            <label for="departamento">Departamentos:</label>
            <select name="departamento" id="departamento" class="form-control view" required></select>
        </div>
        <div class="form-group schedule">
            <label for="activo">Tipo de activos:</label>
            <select name="activo" id="activo" class="form-control view" required></select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
            <thead class="table table-success">
                <tr>
                    <th>N°</th>
                    <th>DEPARTAMENTO</th>
                    <th>RESPONSABLE</th>
                    <th>TIPO DE ACTIVO</th>
                    <th>COD. ACTIVO</th>
                    <th>DESCRIPCION ACTIVO</th>
                    <th>CATALOGO</th>
                    <th>FECHA</th>
                </tr>
            </thead>
            <tbody id="table-body">

            </tbody>
        </table>
    </div>

</div>
<?php include('app/views/components/footer.php'); ?>