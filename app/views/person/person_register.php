<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR NUEVA PERSONA</h1>
    <form action="#" method="post">

        <div class="form-group">
            <label for="num-ci">Cédula de Identidad:</label>
            <input type="text" name="ci" id="num-ci" class="form-control" required>
            <div class="invalid-feedback" id="ci-feedback">
                La cédula de identidad debe tener de 6 a 8 dígitos numéricos. No se permite ingresar letras ni caracteres especiales en el campo. Opcionalmente, se permite ingresar una única letra al final del número de cédula.
            </div>
        </div>



        <div class="form-group">
            <label for="ci_expedition">Departamento de expedición:</label>
            <select name="ci_expedition" id="ci_expedition" class="form-control">
                <option value=""></option>
                <option value="LP">La Paz</option>
                <option value="CB">Cochabamba</option>
                <option value="SC">Santa Cruz</option>
                <option value="OR">Oruro</option>
                <option value="PT">Potosí</option>
                <option value="CH">Chuquisaca</option>
                <option value="TJ">Tarija</option>
                <option value="BN">Beni</option>
                <option value="PA">Pando</option>
            </select>
            <div class="invalid-feedback" id="ci_expedition-feedback">
                Seleccione un departamento de expedición.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Profesión:</label>
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
            <label for="name">Nombres:</label>
            <input type="text" name="name" id="name" class="form-control">
            <div class="invalid-feedback" id="name-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="last_name">Apellido Paterno:</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
            <div class="invalid-feedback" id="last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="mother_last_name">Apellido Materno:</label>
            <input type="text" name="mother_last_name" id="mother_last_name" class="form-control">
            <div class="invalid-feedback" id="mother_last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="date">Fecha de Nacimiento:</label>
            <input type="date" name="date" id="date" class="form-control" required>
            <div class="invalid-feedback" id="date-feedback">
                Seleccione una fecha de nacimiento válida (entre 18 y 60 años) para continuar con el registro.
            </div>
        </div>

        <div class="form-group">
            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address" class="form-control">
            <div class="invalid-feedback" id="address-feedback">
                Ingrese una dirección válida que no exceda los 100 caracteres.
            </div>
        </div>


        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" id="phone" class="form-control">
            <div class="invalid-feedback" id="phone-feedback">
                Por favor, ingrese un número de teléfono válido de hasta 8 dígitos que comience con los dígitos 4, 5 o 2. ¡Gracias!
            </div>
        </div>

        <div class="form-group">
            <label for="cell_phone">Celular:</label>
            <input type="text" name="cell_phone" id="cell_phone" class="form-control">
            <div class="invalid-feedback" id="cell_phone-feedback">
                Por favor, ingrese un número de celular válido de hasta 8 dígitos que comience con los dígitos 6 o 7. ¡Gracias!.
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <div class="invalid-feedback" id="email-feedback">
                Por favor ingresa una dirección de correo electrónico válida. Solo se aceptan cuentas de Gmail, Hotmail y Outlook en minúsculas.
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>