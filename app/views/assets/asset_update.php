<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">MODIFICAR ACTIVO</h1>
    <form action="registrar_activo" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="profession">Proveedor:</label>
            <select name="proveedor" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
            <?php foreach ($proveedores as $proveedor): ?>
                <option value="<?=$proveedor['NIT'];?>" ><?= $proveedor["NOMPROVEEDOR"]; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        

        <div class="form-group">
            <label for="profession">Clase:</label>
            <select name="clase" id="clase" class="form-control" required>
                
            </select>
            
        </div>

        <div class="form-group">
            <label for="profession">Marca:</label>
            <select name="marca" id="marca" class="form-control" required>
            
            </select>
        </div>

        <div class="form-group">
            <label for="profession">Modelo:</label>
            <select name="modelo" id="modelo" class="form-control" required>
                
            </select>
        </div>

        <div class="form-group">
            <label for="profession">Procedencia:</label>
            <select name="procedencia" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Procedencia</option>
            <?php foreach ($procedencias as $procedencia): ?>
                <option value="<?=$procedencia["CODPROCEDENCIA"];?>" ><?= $procedencia["PROCEDENCIA"]; ?></option>
            <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="profession">Año de fabricacion:</label>
            <select name="fabricacion" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Año de fabricación</option>
                <?php
                    for ($i = 1980; $i < 2051; $i++) {
                        echo '<option>' . $i . '</option>';
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="last_name">Numero de Serie:</label>
            <input type="text" name="serie" id="last_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="mother_last_name">Codigo de activo:</label>
            <input type="text" name="cod_act" id="mother_last_name" class="form-control">
        </div>

        <div class="form-group">
            <?php
                $date = date("m-d");
                $year_init = intval(date("Y"))-1;
                $year_fin = intval(date("Y"));
            ?>
            <label for="fec_ing">Fecha de ingreso:</label>
            <br>
            <input class="form-control" type="date" name="fec_ing" id="des_cargo" min="<?php echo $year_init . "-" . $date; ?>" max="<?php echo $year_fin . "-" . $date; ?>" required>

        </div>

        <div class="form-group">
            <label for="address">Descripción:</label>
            <input type="text" name="descripción" id="address" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Usuario registro:</label>
            <input type="number" name="usuario" id="address" class="form-control">
        </div>

        <div class="form-group">
                
                <!--<img class="rounded mx-auto d-block" id="output" top="" width="200px" height="200px" />
                <div style="opacity: 0;">
                    Textosasasa
                </div>-->
                <div >
                    <input type="File" class="form-control" name="fotografia"  required />
                    <!--<div class="invalid-feedback">Necesita ingresar una imagen</div>-->
                    
                </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/igbj/app/scripts/asset/asset_register.js"></script>

<?php include('app/views/components/footer.php'); ?>