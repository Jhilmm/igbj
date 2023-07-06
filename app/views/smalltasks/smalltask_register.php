<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR SUBTAREA</h1>
    <form action="registrar_subtarea?codTar=<?php echo $codTar?>" method="post">

        <div class="form-group">
            <label for="profession">Tarea:</label>
            <select name="name_tarea" id="profession" class="form-control" required>
            <?php 
                foreach ($tareas as $tarea):
                    if($tarea["NOMTAREA"]===$nomTar){
                        echo '<option selected value=' . $tarea["CODTAREA"] . '>'. $tarea["NOMTAREA"] . '</option>';
                    }else{
                        echo '<option value=' . $tarea["CODTAREA"] . '>'. $tarea["NOMTAREA"] . '</option>';
                    }
                endforeach; 
            ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="name_cargo">Subtarea:</label>
            <input class="form-control" type="text" name="name_subtarea" id="name_cargo" required pattern="/^[a-zA-Z]$+/" onkeyup="this.value=this.value.replace(/^\s+/,'');">  
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
<?php ?>
</div>
<?php include('app/views/components/footer.php'); ?>