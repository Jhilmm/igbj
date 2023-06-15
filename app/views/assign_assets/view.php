<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        ACTIVOS ASIGNADOS AL PERSONAL
    </h1>

    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="search" id="search-bar" placeholder="Descripcion del activo...">
        <div class="form-group">
            <label for="personnel">Personal Responsable:</label>
            <select name="personnel" id="personnel" class="form-control">
            </select>
            <input class="form-control-sm" type="search" name="search_responsible" id="search_responsible-bar" placeholder="Juan Perez...">
        </div>
    </div>

    <table class="table table-striped table-responsive table-sm table-condensed">
        <thead class="table-success">
            <tr>
                <th>Codigo Activo</th>
                <th>Descripcion</th>
                <th>Clase</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Seleccionar</th>
                <th>Ver Detalle</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>
    <div class="text-right">
        <button id="assign" class="btn btn-primary">Transferir</button>
    </div>
</div>

<?php include('app/views/components/footer.php'); ?>