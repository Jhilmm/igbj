<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        ACTIVOS REGISTRADOS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="busqueda" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_activo' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Clase</th>
                <th id="last-name">Marca</th>
                <th id="middle-name">Modelo</th>
                <th id="first-name">Procedecia</th>
                <th id="id-number">Fotografia</th>
                <th id="birthdate">Año de fabricacion</th>
                <th id="birthdate">Estado</th>
                <th id="update-assign-item">Acciones</th>
            </tr>
        </thead>
        <tbody id="tabla">
        
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/igbj/app/scripts/asset/asset_search.js"></script>

<?php include('app/views/components/footer.php'); ?>