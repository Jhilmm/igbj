<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">Actualizar CARGO asignado</h1>
    <form action="#" method="post" id="form">
        <div class="form-group">
            <label for="name">Nombre Completo:</label>
            <input type="text" name="name" id="name" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="item">Item:</label>
            <input type="text" name="item" id="item" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="department">Departamentos:</label>
            <select class="form-control" name="department" id="department">
            </select>
            <div class="invalid-feedback" id="department-feedback">
                Seleccione una Departamento para obtener los cargos disponibles.
            </div>
        </div>
        <div class="form-group">
            <label for="position">Cargos:</label>
            <select class="form-control" name="position" id="position">
            </select>
            <div class="invalid-feedback" id="position-feedback">
                Seleccione un Cargo disponible en la lista.
            </div>
        </div>
        <div class="form-group">
            <label for="date">Fecha Asignacion:</label>
            <input type="date" name="date" id="date" class="form-control">
            <div class="invalid-feedback" id="date-feedback">
                Seleccione una fecha de asignacion válida para continuar con el registro.
            </div>
        </div>
        <div class="form-group">
            <label for="cod_memo">Codigo Memorandum:</label>
            <input type="text" name="cod_memo" id="cod_memo" class="form-control">
            <div class="invalid-feedback" id="cod_memo-feedback">
                Por favor, ingrese un codigo de memorandum válido ¡Gracias!.
            </div>
        </div>

        <input type="button" class="btn btn-primary" value="Enviar" id="btn-send">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>