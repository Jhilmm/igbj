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
                <th id="birthdate">Acciones</th>
            </tr>
        </thead>
        <tbody id="person-table-body">
        <?php foreach ($repuestos as $cargo): ?>
            <tr>
                    <td><?= $cargo['NOMREPUESTO']; ?></td>
                    <td><?= $cargo['DETALLEREPUESTO']; ?></td>
                    <td><?= $cargo['NOMTIPOREPUESTO']; ?></td>
                    <td><?= $cargo["FECHA"] ?></td>
                    <td><?= $cargo["MARCA"]?></td>
                    <td><?= $cargo["MODELO"]?></td>
                    <td><?= $cargo["CANTIDAD"]?></td>
                    <td>
                        <?php if ($cargo['ESTADO'] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="/igbj/actualizar_repuesto?repuesto=<?= $cargo['CODREPUESTO']; ?>" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($cargo['ESTADO'] == 1): ?>
                            <div class="icons deshabilitar d-flex justify-content-center">
                                <a href="#" class="fas fa-lock-open align-self-center"></a>
                            </div>
                        <?php else: ?>
                            <div class="icons habilitar d-flex justify-content-center">
                                <a href = "#" class="fas fa-lock align-self-center"></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include('app/views/components/footer.php'); ?>