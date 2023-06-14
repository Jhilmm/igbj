<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<div class="container container-section"> 
    <h1 class="h1 text-center">
        DEPARTAMENTOS REGISTRADOS
    </h1>
   <div class="d-flex justify-content-between">
        <form action="/igbj/departamento" class="form" method="POST">
            <input class="form-control-lg" type="search" name="name_depa" id="search" placeholder="MANTENIMIENTO">
            <button class="btn btn-primary btnb">
                BUSCAR
            </button>
        </form>
        <a class="btn btn-secondary" href="/igbj/registrar_departamento">Crear</a>
   </div>

    <div class="table-responsive">
        <table class="table table-striped table-responsive-sm">
            <thead class="table table-success">
                <tr>
                    <th>DEPARTAMENTO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ESTADO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departamentos as $departamento): ?>
                <tr>
                    <td><?= $departamento['NOMBDEPARTAMENTO']; ?></td>
                    <td><?= $departamento['DESCRIPCION']; ?></td>
                    <td>
                        <?php if ($departamento['ESTADO'] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="/igbj/actualizar_departamento?departamento=<?= $departamento['NOMBDEPARTAMENTO']; ?>" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($departamento['ESTADO'] == 1): ?>
                            <div class="icons deshabilitar d-flex justify-content-center">
                                <a href="/igbj/deshabilitar_departamento?departamento=<?= $departamento['NOMBDEPARTAMENTO']; ?>" class="fas fa-lock-open align-self-center"></a>
                            </div>
                        <?php else: ?>
                            <div class="icons habilitar d-flex justify-content-center">
                                <a href="/igbj/habilitar_departamento?departamento=<?= $departamento['NOMBDEPARTAMENTO']; ?>" class="fas fa-lock align-self-center"></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>    
        
    </div>
</div>
<?php include('app/views/components/footer.php'); ?>