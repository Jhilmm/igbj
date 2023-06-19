<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR NUEVA TAREA</h1>
    <form action="registrar_tarea?codCat=<?php echo $codCatalogo?>" method="post">

        <div class="form-group">
            <label for="profession">Selecciona catalogo:</label>
            <select name="name_cata" id="profession" class="form-control" required>
            <?php
                foreach ($catalogos as $catalogo):
                    if($catalogo["CODCATALOGO"]===$codCatalogo){
                        echo '<option selected value=' . $catalogo["CODCATALOGO"] . '>'. $catalogo["NOMCATALOGO"] . '</option>';
                    }else{
                        echo '<option value=' . $catalogo["CODCATALOGO"] . '>'. $catalogo["NOMCATALOGO"] . '</option>';
                    }
                endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="name_cargo">Tarea:</label>
            <input class="form-control" type="text" name="name_tarea" id="name_cargo" required pattern="/^[a-zA-Z]$+/" onkeyup="this.value=this.value.replace(/^\s+/,'');">  
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>