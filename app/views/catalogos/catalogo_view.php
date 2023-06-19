<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        CATALOGOS REGISTRADOS
    </h1>
    <div class="d-flex justify-content-between">
        <input class="form-control-sm" type="search" name="last_name1" id="search-bar" placeholder="Marco...">
        <a class="btn-sm btn-dark" href='/igbj/registrar_catalogo' id="create-btn">Crear</a>
    </div>

    <div class="form-group">
            <label for="profession">Seleccione Clase:</label>
            <select name="clase" id="clase" class="form-control" onchange="cargarClase();">
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
            <?php foreach ($clases as $clase): 
                    if($clase['CODCLASE']===$classes){
                        echo '<option selected value=' . $clase['CODCLASE'] . '>' . $clase["CLASE"] . '</option>';
                    }else{
                        echo '<option value=' . $clase['CODCLASE'] . '>'. $clase["CLASE"] . '</option>';
                    }    
                  endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

    <table class="table table-striped table-responsive">
        <thead class="table-success">
            <tr>
                <th id="last-name">Clase de activo</th>
                <th id="last-name">Catalogo</th>
                <th id="birthdate">Estado</th>
                <th id="update-assign-item">Acciones</th>
                <th id="update-assign-item">Tareas</th>
            </tr>
        </thead>
        <tbody id="person-table-body">
        <?php
        if($tablas){ 
            foreach ($tablas as $tabla): ?>
            <tr>
                    <td><?= $tabla['CLASE']; ?></td>
                    <td><?= $tabla["NOMCATALOGO"]; ?></td>
                    <td>
                        <?php if ($tabla["ESTADO"] == 1): ?>
                            <span>HABILITADO</span>
                        <?php else: ?>
                            <span>DESHABILITADO</span>
                        <?php endif; ?>
                    </td>
                    <td class="acciones">
                        <div class="icons modificar d-flex justify-content-center">
                            <a href="modificar_catalogo?codigo=<?php echo $tabla["CODCATALOGO"];?>&clase=<?php echo $codClase;?>" class="fas fa-pen align-self-center"></a>
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

                    <td class="">
                            <a class="btn btn-info" href="tarea?codCat=<?php echo $tabla["CODCATALOGO"]; ?>">
                                VER TAREAS
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