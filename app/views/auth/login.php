<?php include('app/views/components/header.php'); ?>

<div class="container">
    <h1 class="mt-5">Iniciar sesión</h1>
    <form action="#" method="post" id="form" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Usuario:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="invalid-feedback" id="username-feedback">
            Ingrese su nombre de usuario para iniciar sesion.
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="invalid-feedback" id="password-feedback">
            Ingrese su Contraseña para iniciar sesion.
        </div>
        <input type="button" class="btn btn-primary" value="Iniciar sesión" id="btn-send">
    </form>
</div>

<?php include('app/views/components/footer.php'); ?>