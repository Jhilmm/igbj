<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR NUEVO CARGO</h1>
    <form action="registrar_cargo" method="post">

        <div class="form-group">
            <label for="profession">Nombre de departamento:</label>
            <select name="name_depa" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Departamento</option>
            <?php foreach ($depas as $depa): ?>
                <option value="<?=$depa['CODDEPARTAMENTO'];?>" ><?= $depa['NOMBDEPARTAMENTO']; ?></option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Nombre de cargo:</label>
            <input type="des_depa" name="cargo" id="name" class="form-control">
            <div class="invalid-feedback" id="name-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50 caracteres.
            </div>
            
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>