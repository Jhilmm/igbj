<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container register">
    <h1 class="h1 text-center">
        GENERAR NUEVA ORDEN DE TRABAJO
    </h1>

    <!--Formulario de registro-->
    <form action="registrar_orden_trabajo" method="POST">

        <div class="form-group">
            <?php
            $fecha_actual = date("Y-m-d");
            $semana_antes = date("Y-m-d", strtotime("-1 week"));
            ?>
            <label for="fec_orden">Fecha orden:</label>
            <input type="date" class="form-control" name="fec_orden" id="fec_orden" min="<?php echo $semana_antes; ?>" max="<?php echo $fecha_actual; ?>" required>

        </div>

        <div class="fila">
            <div class="form-group work">
                <label for="resp_activo">Responsable activo:</label>
                <select name="resp_activo" id="resp_activo" class="form-control" required></select>
            </div>

            <div class="form-group work">
                <label for="cod_activo">Codigo activo:</label>
                <select name="cod_activo" id="cod_activo" class="form-control" required></select>
            </div>
        </div>

        <div class="form-group">
            <label for="des_sintomas">Descripción de sintomas:</label>
            <textarea name="des_sintomas" id="des_sintomas" cols="30" rows="3" class="form-control" required></textarea>
        </div>

        <div class="row justify-content-center">
            <button class="btn btn-success" type="submit">Guardar</button>
            <a class="btn btn-danger" href="/igbj/proveedor">
                Cancelar
            </a>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/igbj/app/scripts/work_order/work_order_register.js"></script>
<?php include('app/views/components/footer.php'); ?>