<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
</head>
<div class="container container-section">
        <!--Titulo-->
        <h1 class="h1 text-center">
            ORDENES DE TRABAJOS PENDIENTES
        </h1>

        <!--Buscador-->
        <div class="d-flex justify-content-between">
            <form action="/igbj/orden_trabajo" class="form" method="POST">
                <input class="form-control-lg" type="search" name="name_depa" id="search" placeholder="DEPARTAMENTO">
                <button class="btn btn-primary btnb">
                    BUSCAR
                </button>
            </form>
            <a class="btn btn-secondary" href="/igbj/registrar_orden_trabajo">Crear</a>
        </div>

        <!--Tabla de datos-->
        <table class="table table-responsive-sm">
        <thead class="table table-success">
            <tr>
                <th>Cod. Orden</th>
                <th>Fecha orden</th>
                <th>Departamento</th>
                <th>Responsable</th>
                <th>Cod. Activo</th>
                <th>Desc. Activo</th>
                <th>Desc. Orden</th>                
                <th >Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($ordenes as $orden): ?>
            <tr>
                <td><?= $orden['CODORDENTRABAJO'];?></td>
                <td><?= $orden['FECHAORDEN'];?></td>
                <td><?= $orden['NOMBDEPARTAMENTO'];?></td>
                <td><?= $orden['NOMBRES'].' '.$orden['APPATERNO'].' '. $orden['APMATERNO'];?></td>
                <td><?= $orden['CODACTIVO'];?></td>
                <td><?= $orden['DESCRIPCION'];?></td>
                <td><?= $orden['DESCRIPSINTOMAS'];?></td>
                <td class="acciones">
                    <div class="icons print d-flex justify-content-center">
                        <a href="/igbj/reporte_orden_trabajo?orden=<?= $orden['CODORDENTRABAJO']; ?>" class="fas fa-print align-self-center" target="_blank"></a>
                    </div>
                </td>
            </tr>
        <?php endforeach?>              
        </tbody>
        </table>
    </div>

<?php include('app/views/components/footer.php'); ?>