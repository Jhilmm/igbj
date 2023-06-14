<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>

<div class="container container-section"> 
    <h1 class="h1 text-center">
        PROVEEDORES REGISTRADOS
    </h1>   

    <!--Buscador-->
    <div class="d-flex justify-content-between">
        <form action="/igbj/proveedor" class="form" method="POST">
            <input class="form-control-lg" type="search" name="name_pro" id="search" placeholder="PROVEEDOR">
            <button class="btn btn-primary btnb">
                BUSCAR
            </button>
        </form>
        <a class="btn btn-secondary" href="/igbj/registrar_proveedor">Crear</a>
    </div>

    <!--Tabla de datos-->
    <div class="table-responsive">
    <table class="table table-striped table-responsive-sm">
        <thead class="table-success">
            <tr>
                <th>NIT</th>
                <th>PROVEEDOR</th>
                <th>DIRECCIÓN</th>
                <th>TELEFONO</th>
                <th>CONTACTO</th>
                <th>CELULAR</th>
                <th>CORREO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($proveedores as $proveedor): ?>
        <tr>
            <td><?= $proveedor['NIT']; ?></td>
            <td><?= $proveedor['NOMPROVEEDOR']; ?></td>
            <td><?= $proveedor['DIRECCION']; ?></td>
            <td><?= $proveedor['TELEFONOPROVEEDOR']; ?></td>
            <td><?= $proveedor['CONTACTO']; ?></td>
            <td><?= $proveedor['CELULARCONTACTO']; ?></td>
            <td><?= $proveedor['CORREOCONTACTO']; ?></td>
            <td>
                <?php if ($proveedor['ESTADO'] == 1): ?>
                    <span>HABILITADO</span>
                <?php else: ?>
                    <span>DESHABILITADO</span>
                <?php endif; ?>
            </td>
            <td class="acciones">
                <div class="icons modificar d-flex justify-content-center">
                    <a href="/igbj/actualizar_proveedor?proveedor=<?= $proveedor['NIT']; ?>" class="fas fa-pen align-self-center"></a>
                </div>                                              
                <?php if ($proveedor['ESTADO'] == 1): ?>
                    <div class="icons deshabilitar d-flex justify-content-center">
                        <a href="/igbj/deshabilitar_proveedor?proveedor=<?= $proveedor['NIT']; ?>" class="fas fa-lock-open align-self-center"></a>
                    </div>
                <?php else: ?>
                    <div class="icons habilitar d-flex justify-content-center">
                        <a href="/igbj/habilitar_proveedor?proveedor=<?= $proveedor['NIT']; ?>" class="fas fa-lock align-self-center"></a>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>

<?php include('app/views/components/footer.php'); ?>