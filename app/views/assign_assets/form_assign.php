<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container my-4">
    <h1 class="h1 text-center mx-auto" id="registered-users">
        FORMULARIO DE ASIGNACION DE ACTIVOS SELECCIONADOS
    </h1>
    <form action="#" method="post" id="form">

        <div class="form-group">
            <label for="cod">Codigo de Activo:</label>
            <input type="text" name="cod" id="cod" class="form-control">
            <div class="invalid-feedback" id="cod-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50
                caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="description">Descripcion de Activo:</label>
            <input type="text" name="description" id="description" class="form-control">
            <div class="invalid-feedback" id="description-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30
                caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="cant_assets">Cantidad de Activos:</label>
            <input type="text" name="cant_assets" id="cant_assets" class="form-control">
            <div class="invalid-feedback" id="cant_assets-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30
                caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="personnel">Responsable Actual:</label>
            <select name="personnel" id="personnel" class="form-control">
            </select>
        </div>

        <div class="form-group">
            <label for="personnel">Nuevo Responsable:</label>
            <select name="personnel" id="personnel" class="form-control">
            </select>
            <div class="invalid-feedback" id="personnel-feedback">
                Seleccione un departamento de expedición.
            </div>
        </div>

        <div class="form-group">
            <label for="date">Fecha de Asignacion:</label>
            <input type="date" name="date" id="date" class="form-control">
            <div class="invalid-feedback" id="date-feedback">
                Seleccione una fecha de asignacion válida para continuar con el registro.
            </div>
        </div>

        <div class="form-group">
            <label for="address">Documento de Asignacion:</label>
            <input type="text" name="address" id="address" class="form-control">
            <div class="invalid-feedback" id="address-feedback">
                Ingrese un codigo de memorandum válido que no exceda los 50 caracteres.
            </div>
        </div>

        <input type="button" class="btn btn-primary" value="Enviar" id="btn-send">
    </form>
</div>

<?php include('app/views/components/footer.php'); ?>