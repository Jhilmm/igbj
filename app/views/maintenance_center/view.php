<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        CENTROS DE MANTENIMIENTOS REGISTRADOS
    </h1>

    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="search" id="search-bar" placeholder="Biomedica...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_centro_mantenimiento' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive table-sm table-condensed">
        <thead class="table-success">
            <tr>
                <th>Centro de Mantenimiento</th>
                <th>Descripcion</th>
                <th>Modificar</th>
                <th>Tecnicos</th>
                <th>Habilitar/Deshabilitar</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>
</div>

<?php include('app/views/components/footer.php'); ?>