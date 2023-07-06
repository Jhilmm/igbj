<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        REPUESTOS REGISTRADOS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
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
        <tbody id="person-table-body">
        <?php foreach ($activos as $activo): ?>
            <tr>
                    <td><?= $activo['CLASE']; ?></td>
                    <td><?= $activo['MARCA']; ?></td>
                    <td><?= $activo['MODELO']; ?></td>
                    <td><?= $activo['PROCEDENCIA']; ?></td>
                    <td><center><img height="108px" width="192px" src="data:image/png;base64,<?= base64_encode($activo["FOTOGRAFIA"]);?>"></center></td>
                    <td><?= $activo['ANIOFABRICACION']; ?></td>
                    <td>
                        <?php if ($activo['ESTADOACTIVO'] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="#" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($activo['ESTADOACTIVO'] == 1): ?>
                            <div class="icons deshabilitar d-flex justify-content-center">
                                <a href="/igbj/deshabilitar_activo?codigo=<?= $activo['CODACTIVO']; ?>" class="fas fa-lock-open align-self-center"></a>
                            </div>
                        <?php else: ?>
                            <div class="icons habilitar d-flex justify-content-center">
                                <a href="/igbj/habilitar_activo?codigo=<?= $activo['CODACTIVO']; ?>" class="fas fa-lock align-self-center"></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include('app/views/components/footer.php'); ?>