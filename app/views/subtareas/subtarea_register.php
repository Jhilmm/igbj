<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR NUEVO CARGO</h1>
    <form action="registrar_catalogo" method="post">

        <div class="form-group">
            <label for="profession">Selecciona clase activo:</label>
            <select name="name_clase" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Selecciona clase activo:</option>
            <?php foreach ($catalogos as $catalogo):
                    echo '<option value=' . $catalogo['CODCLASE'] . '>'. $catalogo["CLASE"] . '</option>';
                  endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="name_cargo">Catalogo:</label>
            <input class="form-control" type="text" name="name_catalogo" id="name_cargo" required pattern="/^[a-zA-Z]$+/" onkeyup="this.value=this.value.replace(/^\s+/,'');">  
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
<?php ?>
</div>
<?php include('app/views/components/footer.php'); ?>