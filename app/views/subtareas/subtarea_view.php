<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
<h1 class="text-center">
        SubTarea:
    </h1>    

    <h1 class="text-center">
        Catalogo: <?php echo $tarea["NOMCATALOGO"];?>
    </h1>

    <h1 class="text-center">
        Tarea: <?php echo $tarea["NOMTAREA"];?>
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_catalogo' id="create-btn">Crear</a>
    </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">SubTarea</th>
                <th id="birthdate">Estado</th>
                <th id="update-assign-item">Acciones</th>

            </tr>
        </thead>
        <tbody id="person-table-body">
        <?php
        if($tablas){ 
            foreach ($tablas as $tabla): ?>
            <tr>
                    <td><?= $tabla["NOMSUBTAREA"]; ?></td>
                    <td>
                        <?php if ($tabla["ESTADO"] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="#" class="fas fa-pen align-self-center"></a>
                        </div>                                              
                        <?php if ($tabla["ESTADO"] == 1): ?>
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