<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR NUEVA REPUESTO</h1>
    <form action="#" method="post">

        <div class="form-group">
            <label for="name">Nombres:</label>
            <input type="text" name="name" id="name" class="form-control">
            <div class="invalid-feedback" id="name-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Tipo de repuesto:</label>
            <select name="profesion" id="profession" class="form-control">
                <option value=""></option>
                <option value="Ingeniero">Ingeniero</option>
                <option value="Médico">Médico</option>
                <option value="Abogado">Abogado</option>
                <option value="Arquitecto">Arquitecto</option>
                <option value="Profesor">Profesor</option>
                <option value="Otro">Otro</option>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="last_name">Fecha de ingreso:</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
            <div class="invalid-feedback" id="last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="mother_last_name">Detalle de ingreso:</label>
            <input type="text" name="mother_last_name" id="mother_last_name" class="form-control">
            <div class="invalid-feedback" id="mother_last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="date">Marca:</label>
            <input type="date" name="date" id="date" class="form-control" required>
            <div class="invalid-feedback" id="date-feedback">
                Seleccione una fecha de nacimiento válida (entre 18 y 60 años) para continuar con el registro.
            </div>
        </div>

        <div class="form-group">
            <label for="address">Modelo:</label>
            <input type="text" name="address" id="address" class="form-control">
            <div class="invalid-feedback" id="address-feedback">
                Ingrese una dirección válida que no exceda los 100 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Cantidad:</label>
            <input type="text" name="phone" id="phone" class="form-control">
            <div class="invalid-feedback" id="phone-feedback">
                Por favor, ingrese un número de teléfono válido de hasta 8 dígitos que comience con los dígitos 4, 5 o 2. ¡Gracias!
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>