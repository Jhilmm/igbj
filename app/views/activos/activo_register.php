<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>


<div class="container">
    <h1 class="h1 text-center mt-5 mb-4">REGISTRAR NUEVO ACTIVO</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="profession">Proveedor:</label>
            <select name="name_depa" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
            <?php foreach ($proveedor as $prov): ?>
                <option value="<?=$prov['NIT'];?>" ><?= $prov["NOMPROVEEDOR"]; ?></option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>
        

        <div class="form-group">
            <label for="profession">Clase:</label>
            <select name="name_depa" id="clase" class="form-control" onchange="cargarMarca();" required>
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
            <?php foreach ($clases as $clase): 
                    if($clase['CODCLASE']===$classes){
                        echo '<option selected value=' . $clase['CODCLASE'] . '>' . $clase["CLASE"] . '</option>';
                    }else{
                        echo '<option value=' . $clase['CODCLASE'] . '>'. $clase["CLASE"] . '</option>';
                    }    
                  endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Marca:</label>
            <select name="name_depa" id="marca" class="form-control" onchange="cargarModelo();" required>
            <?php foreach ($marcas as $marca): 
                    if($marca['CODMARCA']===$marcca){
                        echo '<option selected value=' . $marca['CODMARCA']. '>' . $marca['MARCA'] . '</option>';
                    }else{
                        echo '<option value=' . $marca['CODMARCA'] . '>'. $marca["MARCA"] . '</option>';
                    }    
                  endforeach; ?>
            </select>
            </select>

            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        

        <div class="form-group">
            <label for="profession">Modelo:</label>
            <select name="name_depa" id="modelo" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
            <?php foreach ($modelos as $modelo): 
                    
            ?>
                <option value="<?=$modelo['CODMODELO'];?>" ><?= $modelo["MODELO"]; ?></option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <script language="javaScript">

        function cargarMarca(){
                    
                    var clase = document.getElementById("clase").value;
                    window.location.href="registrar_activo?clase="+clase;
        }

        /*
        function cargarModelo(){
                    var clase = document.getElementById("name_clase").value;
                    var marca = document.getElementById("name_marca").value;
                    window.location.href="activo_register.php?clase="+clase+"&marca="+marca;
        }*/
        

                function cargarModelo(){
                    var clase = document.getElementById("modelo").value;
                    var marca = document.getElementById("modelo").value;
                    window.location.href="registrar_activo?clase="+clase+"&marca="+marca;
                }
        </script>

        <div class="form-group">
            <label for="profession">Procedencia:</label>
            <select name="name_depa" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
            <?php foreach ($proveedor as $prov): ?>
                <option value="<?=$procedencia["CODPROCEDENCIA"];?>" ><?= $procedencia["PROCEDENCIA"]; ?></option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="profession">Año de fabricacion:</label>
            <select name="name_depa" id="profession" class="form-control" required>
                <option value="" disabled="disabled" selected>Seleccione Proveedor</option>
                <?php
                    for ($i = 1980; $i < 2051; $i++) {
                        echo '<option>' . $i . '</option>';
                    }
                ?>
            </select>
            <div class="invalid-feedback" id="profession-feedback">
                Seleccione una profesión.
            </div>
        </div>

        <div class="form-group">
            <label for="last_name">Numero de Serie:</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
            <div class="invalid-feedback" id="last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="mother_last_name">Codigo de activo:</label>
            <input type="text" name="mother_last_name" id="mother_last_name" class="form-control">
            <div class="invalid-feedback" id="mother_last_name-feedback">
                Por favor, ingrese un apellido válido que contenga únicamente letras del alfabeto y no exceda los 30 caracteres.
            </div>
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
            <input type="text" name="address" id="address" class="form-control">
            <div class="invalid-feedback" id="address-feedback">
                Ingrese una dirección válida que no exceda los 100 caracteres.
            </div>
        </div>

        <div class="form-group">
            <label for="address">Usuario registro:</label>
            <input type="text" name="address" id="address" class="form-control">
            <div class="invalid-feedback" id="address-feedback">
                Ingrese una dirección válida que no exceda los 100 caracteres.
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</div>
<?php include('app/views/components/footer.php'); ?>