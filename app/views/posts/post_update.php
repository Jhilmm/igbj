<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">MODIFICAR CARGO</h1>
    <form action="modificar_cargo" method="post">

        <div class="form-group">
            <label for="profession">Nombre de cargo:</label>
            <input type="des_depa" name="cargo" id="name" class="form-control" value="<?php echo $cargo['CARGO'];?>">
            
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>