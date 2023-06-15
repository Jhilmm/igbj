<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">ACTUALIZAR DATOS DE PERSONA</h1>
    <form action="#" method="post" id="form">

        <div class="form-group">
            <label for="num_ci">Cédula de Identidad:</label>
            <input type="text" name="num_ci" id="num_ci" class="form-control">
            <div class="invalid-feedback" id="num_ci-feedback">
                La cédula de identidad debe tener de 6 a 8 dígitos numéricos. No se permite ingresar letras ni
                caracteres especiales en el campo. Opcionalmente, se permite ingresar una única letra al final del
                número de cédula.
            </div>
        </div>

        <div class="form-group">
            <label for="ci_expedition">Departamento de expedición:</label>
            <select name="ci_expedition" id="ci_expedition" class="form-control">
            </select>
            <div class="invalid-feedback" id="ci_expedition-feedback">
                Seleccione un departamento de expedición.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Profesión:</label>
            <select name="profession" id="profession" class="form-control">
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="name">Nombres:</label>
            <input type="text" name="name" id="name" class="form-control">
            <div class="invalid-feedback" id="name-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50
                caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="lastname">Apellido Paterno:</label>
            <input type="text" name="lastname" id="lastname" class="form-control">
            <div class="invalid-feedback" id="lastname-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30
                caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="second_lastname">Apellido Materno:</label>
            <input type="text" name="second_lastname" id="second_lastname" class="form-control">
            <div class="invalid-feedback" id="second_lastname-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30
                caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="date">Fecha de Nacimiento:</label>
            <input type="date" name="date" id="date" class="form-control">
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
                Por favor, ingrese un número de teléfono válido de hasta 8 dígitos que comience con los dígitos 4, 5 o
                2. ¡Gracias!
            </div>
        </div>

        <div class="form-group">
            <label for="cell_phone">Celular:</label>
            <input type="text" name="cell_phone" id="cell_phone" class="form-control">
            <div class="invalid-feedback" id="cell_phone-feedback">
                Por favor, ingrese un número de celular válido de hasta 8 dígitos que comience con los dígitos 6 o 7.
                ¡Gracias!.
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            <div class="invalid-feedback" id="email-feedback">
                Por favor ingresa una dirección de correo electrónico válida. Solo se aceptan cuentas de Gmail, Hotmail
                y Outlook en minúsculas.
            </div>
        </div>

        <div class="form-group">
            <label for="gender">Sexo:</label>
            <div id="gender" class="form-control-radio">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                    <label class="form-check-label" for="masculino">Masculino</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                    <label class="form-check-label" for="femenino">Femenino</label>
                </div>
            </div>
            <div class="invalid-feedback" id="gender-feedback">
                Por favor selecciona un género válido.
            </div>
        </div>




        <input type="button" class="btn btn-primary" value="Enviar" id="btn-send">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>