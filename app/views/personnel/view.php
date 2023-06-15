<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        PERSONAS REGISTRADAS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_persona' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive table-sm table-condensed">
        <thead class="table-success">
            <tr>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>Cedula de Identidad</th>
                <th>Fecha de Nacimiento</th>
                <th>Profesion</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>Modificar</th>
                <th>Update/Assign Item</th>
                <th>Update/Assign Position</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>
</div>

<?php include('app/views/components/footer.php'); ?>