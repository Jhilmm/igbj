<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        CARGOS REGISTRADOS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_persona' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Codigo Cargo</th>
                <th id="middle-name">Departamento</th>
                <th id="first-name">Cargo</th>
                <th id="id-number">Estado</th>
                <th id="birthdate">Acciones</th>
                <th id="update-assign-item">Update/Assign Item</th>
                <th id="update-assign-position">Update/Assign Position</th>
            </tr>
        </thead>
        <tbody id="person-table-body">
        </tbody>
    </table>
</div>


<?php include('app/views/components/footer.php'); ?>