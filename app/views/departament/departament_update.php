<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container register">
    <?php foreach ($departamentos as $departamento): ?>
    <h1 class="h1 text-center">
        EDITAR DATOS DE <?php echo $departamento["NOMBDEPARTAMENTO"] ?>
    </h1>    
    <form action="actualizar_departamento" method="POST">
        <div class="form-group">
            <label for="cod_depa">Código departamento:</label>
            <input class="form-control" type="text" name="cod_depa" id="cod_depa" maxlength="50"  value="<?php echo $departamento["CODDEPARTAMENTO"]; ?>" readonly>
            <label for="name_depa">Nombre de departamento:</label>
            <input class="form-control" type="text" name="name_depa" id="name_depa" maxlength="50" pattern="^[a-zA-Z\d\s]+$" onkeyup="this.value=this.value.replace(/^\s+/,'');"  value="<?php echo $departamento["NOMBDEPARTAMENTO"]; ?>" required>
            <label for="des_depa">Descripción departamento:</label>
            <input class="form-control" type="text" name="des_depa" id="des_depa" maxlength="50" value="<?php echo $departamento["DESCRIPCION"]; ?>" onkeyup="this.value=this.value.replace(/^\s+/,'');">
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-success" type="submit">Guardar</button>
            <a class="btn btn-danger" href="/igbj/departamento">
                Cancelar
            </a>
        </div>
    </form>
    <?php endforeach; ?>
</div>
<?php include('app/views/components/footer.php'); ?>