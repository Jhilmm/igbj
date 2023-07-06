<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="text-center">
        TAREAS
    </h1>    

    <h1 class="text-center">
        Catalogo: <?php echo $catalogo["NOMCATALOGO"];?>
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_tarea?codCat=<?php echo $codCat?>' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Tarea</th>
                <th id="birthdate">Estado</th>
                <th id="update-assign-item">Acciones</th>
                <th id="update-assign-item">Sub Tareas</th>

            </tr>
        </thead>
        <tbody id="person-table-body">
        <?php
        if($tablas){ 
            foreach ($tablas as $tabla): ?>
            <tr>
                    <td><?= $tabla["NOMTAREA"]; ?></td>
                    <td>
                        <?php if ($tabla["ESTADO"] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="/igbj/modificar_tarea?tarea=<?= $tabla['CODTAREA'];?>&codCat=<?php echo $catalogo["CODCATALOGO"];?>" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($tabla["ESTADO"] == 1): ?>
                            <div class="icons deshabilitar d-flex justify-content-center">
                                <a href="/igbj/deshabilitar_tarea?codigo=<?= $tabla['CODTAREA'];?>&codCat=<?php echo $catalogo["CODCATALOGO"];?>" class="fas fa-lock-open align-self-center"></a>
                            </div>
                        <?php else: ?>
                            <div class="icons habilitar d-flex justify-content-center">
                                <a href="/igbj/habilitar_tarea?codigo=<?= $tabla['CODTAREA'];?>&codCat=<?php echo $catalogo["CODCATALOGO"];?>" class="fas fa-lock align-self-center"></a>
                            </div>
                        <?php endif; ?>
                    </td>

                    <td class="">
                            <a class="btn btn-info" href="subtarea?codTar=<?php echo $tabla["CODTAREA"]; ?>">
                                VER SUBTAREAS
                            </a>
                    </td>
                </tr>
                <?php endforeach; 
            }?>
        </tbody>
    </table>
    <script language="javaScript">
        function cargarClase(){
                    
            var clase = document.getElementById("clase").value;
            //window.location.href="catalogo_view.php?clase="+clase;
            window.location.href="catalogo?clase="+clase;
        }

    </script>
</div>


<?php include('app/views/components/footer.php'); ?>