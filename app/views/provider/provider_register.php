<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container register">
    <h1 class="h1 text-center">
        REGISTRAR NUEVO PROVEEDOR
    </h1>
    <!--Formulario de registro-->
    <form action="registrar_proveedor" method="POST">
        <div class="fila">
            <div class="form-group container-input">
                <label for="nit">NIT:</label>
                <input class="form-control" type="number" name="nit" id="nit" required>
            </div>

            <div class="form-group container-input">
                <label for="name_pro">Nombre del proveedor:</label>
                <input class="form-control" type="text" id="name_pro" name="name_pro" required pattern="^[a-zA-Z\d\s.]+$" onkeyup="this.value=this.value.replace(/^\s+/,'');">
            </div>
        </div>
        <div class="fila">
            <div class="form-group container-input">
                <label for="dir_pro">Dirección:</label>
                <input class="form-control" type="text" id="dir_pro" name="dir_pro" required pattern="^[a-zA-Z\d\s\-,#]+$" onkeyup="this.value=this.value.replace(/^\s+/,'');">
            </div>

            <div class="form-group container-input">
                <label for="tel_pro">Telefono proveedor:</label>
                <input class="form-control" type="number" id="tel_pro" name="tel_pro" required min="60000000" max="79999999">
            </div>
        </div>

        <div class="fila">
            <div class="form-group container-input">
                <label for="cont_pro">Contacto:</label>
                <input class="form-control" type="text" id="cont_pro" name="cont_pro" required pattern="^[a-zA-Z\d\s]+$" onkeyup="this.value=this.value.replace(/^\s+/,'');">
            </div>

            <div class="form-group container-input">
                <label for="correo_pro">Correo de contacto:</label>
                <input class="form-control" type="email" id="correo_pro" name="correo_pro" required>
            </div>
        </div>

        <div class="fila">
            <div class="form-group container-input">
                <label for="cel_pro">Celular de contacto:</label>
                <input class="form-control" type="number" id="cel_pro" name="cel_pro" min="60000000" max="79999999" required>
            </div>
            <div class="form-group container-input">

            </div>
        </div>

        <div class="row justify-content-center">
            <button class="btn btn-success" type="submit">Guardar</button>
            <a class="btn btn-danger" href="/igbj/proveedor">
                Cancelar
            </a>
        </div>

    </form>
</div>
<?php include('app/views/components/footer.php'); ?>