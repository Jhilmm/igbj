<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        PERSONAS REGISTRADAS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_persona' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Apellido Paterno</th>
                <th id="middle-name">Apellido Materno</th>
                <th id="first-name">Nombres</th>
                <th id="id-number">Cedula de Identidad</th>
                <th id="birthdate">Fecha de Nacimiento</th>
                <th id="profession">Profesion</th>
                <th id="address">Direccion</th>
                <th id="phone">Telefono</th>
                <th id="mobile">Celular</th>
                <th id="email">Email</th>
                <th id="gender">Sexo</th>
                <th id="modify">Modificar</th>
                <th id="update-assign-item">Update/Assign Item</th>
                <th id="update-assign-position">Update/Assign Position</th>
            </tr>
        </thead>
        <tbody id="person-table-body">
        </tbody>
    </table>
</div>


<?php include('app/views/components/footer.php'); ?>