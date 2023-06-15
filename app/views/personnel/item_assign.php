<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">Asignar un ÍTEM</h1>
    <form action="#" method="post" id="form">
        <div class="form-group">
            <label for="num_ci">Cédula de Identidad:</label>
            <input type="text" name="num_ci" id="num_ci" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="name">Nombre Completo:</label>
            <input type="text" name="name" id="name" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="item">Item:</label>
            <select name="item" id="item" class="form-control">
            </select>
            <div class="invalid-feedback" id="item-feedback">
                Seleccione un item disponible en la lista.
            </div>
        </div>
        <div class="form-group">
            <label for="date">Fecha de Asignación:</label>
            <input type="date" name="date" id="date" class="form-control">
            <div class="invalid-feedback" id="date-feedback">
                Seleccione una fecha de asignacion valida para continuar con el registro.
            </div>
        </div>

        <input type="button" class="btn btn-primary" value="Enviar" id="btn-send">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>