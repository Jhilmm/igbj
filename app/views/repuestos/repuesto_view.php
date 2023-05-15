<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        REPUESTOS REGISTRADOS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_repuesto' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Nombre Repuesto</th>
                <th id="middle-name">Detalle Repuesto</th>
                <th id="first-name">Tipo Repuesto</th>
                <th id="id-number">Fecha Ingreso</th>
                <th id="birthdate">Marca</th>
                <th id="birthdate">Modelo</th>
                <th id="birthdate">Cantidad Ingreso</th>
                <th id="birthdate">Estado</th>
                <th id="update-assign-item">Update/Assign Item</th>
                <th id="update-assign-position">Update/Assign Position</th>
            </tr>
        </thead>
        <tbody id="person-table-body">
        </tbody>
    </table>
</div>


<?php include('app/views/components/footer.php'); ?>