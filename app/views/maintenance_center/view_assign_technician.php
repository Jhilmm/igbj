<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        ASIGNAR TECNICOS AL CENTRO DE MANTENIMIENTO
    </h1>

    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="search" id="search-bar" placeholder="Juan Perez...">
    </div>

    <table class="table table-striped table-responsive table-sm table-condensed">
        <thead class="table-success">
            <tr>
                <th>Numero de Item</th>
                <th>Nombre Completo</th>
                <th>Cargo</th>
                <th>Asignar</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>
</div>

<?php include('app/views/components/footer.php'); ?>