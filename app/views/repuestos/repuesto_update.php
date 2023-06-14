<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">ACTUALIZAR REPUESTO</h1>
    <form action="actualizar_repuesto" method="post">

    <?php foreach ($repuestos as $repuesto): ?>
        <div class="form-group">
            <label for="name">Nombre de repuesto:</label>
            <input type="text" name="cod_rep" id="name" class="form-control" value="<?php echo $repuesto['CODREPUESTO'];?>">
            <div class="invalid-feedback" id="name-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="name">Nombre de repuesto:</label>
            <input type="text" name="name_rep" id="name" class="form-control" value="<?php echo $repuesto['NOMREPUESTO']?>">
            <div class="invalid-feedback" id="name-feedback">
                Por favor, ingrese un nombre válido que contenga únicamente letras del alfabeto y no exceda los 50 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Tipo de repuesto:</label>
            <select name="name_tipo_rep" id="profession" class="form-control" required>
            <?php
                foreach ($tipoRep as $tipo):
                    if($tipo['CODTIPOREPUESTO'] === $repuesto['CODTIPOREPUESTO']){
                        echo '<option selected value="'.$tipo['CODTIPOREPUESTO'].'">' . $tipo['NOMTIPOREPUESTO'] . '</option>';
                    }else{
                        echo '<option value="'.$tipo['CODTIPOREPUESTO'].'">' . $tipo['NOMTIPOREPUESTO'] . '</option>';
                    } 
                    
                endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="mother_last_name">Detalle de repuesto:</label>
            <input type="text" name="det_rep" id="mother_last_name" class="form-control" value="<?php echo $repuesto['DETALLEREPUESTO']?>">
            <div class="invalid-feedback" id="mother_last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="last_name">Fecha de ingreso:</label> 
            <input type="date"  name="fec_ing" id="last_name" class="form-control" value="<?php echo $repuesto['FECHA']?>">
            <div class="invalid-feedback" id="last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="date">Marca:</label>
            <input type="text" name="marca" id="date" class="form-control" value="<?php echo $repuesto['MARCA']?>" required>
            <div class="invalid-feedback" id="date-feedback">
                Seleccione una fecha de nacimiento válida (entre 18 y 60 años) para continuar con el registro.
            </div>
        </div>

        <div class="form-group">
            <label for="address">Modelo:</label>
            <input type="text" name="modelo" id="address" class="form-control" value="<?php echo $repuesto['MODELO']?>">
            <div class="invalid-feedback" id="address-feedback">
                Ingrese una dirección válida que no exceda los 100 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="phone">Cantidad:</label>
            <input type="text" name="cant" id="phone" class="form-control" value="<?php echo $repuesto['CANTIDAD']?>">
            <div class="invalid-feedback" id="phone-feedback">
                Por favor, ingrese un número de teléfono válido de hasta 8 dígitos que comience con los dígitos 4, 5 o 2. ¡Gracias!
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
        <?php endforeach; ?>
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>