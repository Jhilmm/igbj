<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        CARGOS REGISTRADOS EN EL SISTEMA
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_cargo' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Codigo Cargo</th>
                <th id="middle-name">Departamento</th>
                <th id="first-name">Cargo</th>
                <th id="id-number">Estado</th>
                <th id="birthdate">Acciones</th>
            </tr>
        </thead>
        <tbody id="person-table-body">
        <?php foreach ($cargos as $cargo): ?>
            <tr>
                    <td><?= $cargo['CODCARGO']; ?></td>
                    <td><?= $cargo['CODDEPARTAMENTO']; ?></td>
                    <td><?= $cargo['CARGO']; ?></td>
                    <td>
                        <?php if ($cargo['ESTADO'] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="#" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($cargo['ESTADO'] == 1): ?>
                            <div class="icons deshabilitar d-flex justify-content-center">
                                <a href="/igbj/deshabilitar_cargo?cargo=<?= $cargo['CARGO']; ?>" class="fas fa-lock-open align-self-center"></a>
                            </div>
                        <?php else: ?>
                            <div class="icons habilitar d-flex justify-content-center">
                                <a href="/igbj/habilitar_cargo?cargo=<?= $cargo['CARGO']; ?>" class="fas fa-lock align-self-center"></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include('app/views/components/footer.php'); ?>