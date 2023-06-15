<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">ACTUALIZAR CENTRO DE MANTENIMIENTO</h1>
    <form action="#" method="post" id="form">
        <div class="form-group">
            <label for="name_center">Nombre Centro de Mantenimiento:</label>
            <input type="text" name="name_center" id="name_center" class="form-control">
            <div class="invalid-feedback" id="name_center-feedback">
                El nombre del centro de mantenimiento debe tener entre 5 y 50 caracteres, solo se permite ingresar
                caracteres alfabeticos.
            </div>
        </div>

        <div class="form-group">
            <label for="description">Descripcion del centro de mantenimiento:</label>
            <input type="text" name="description" id="description" class="form-control">
            <div class="invalid-feedback" id="description-feedback">
                La descripcion debe ser de un maximo de 100 caracteres, solo se permite ingresar caracteres alfabeticos.
            </div>
        </div>

        <input type="button" class="btn btn-primary" value="Enviar" id="btn-send">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>