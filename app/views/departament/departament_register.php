<?php include($_SERVER['DOCUMENT_ROOT'] . '/igbj/app/views/components/header.php'); ?>

<div  class="container register">
    <h1 class="h1 text-center">
        REGISTRAR NUEVO DEPARTAMENTO
    </h1>
    <form action="registrar_departamento" method="POST">
        <div class="form-group">
            <label for="name_depa">Nombre de departamento:</label>
            <input class="form-control" type="text" name="name_depa" id="name_depa" maxlength="50" pattern="^[a-zA-Z\d\s]+$" 
            onkeyup="this.value=this.value.replace(/^\s+/,'');" autocomplete="off" required>  
        </div>
        <div class="form-group">
            <label for="des_depa">Descripción departamento:</label>
            <input class="form-control" type="text" name="des_depa" id="des_depa" maxlength="300"
            onkeyup="this.value=this.value.replace(/^\s+/,'');" autocomplete="off">
        </div>
        
        <div class="row justify-content-center">
            <button class="btn btn-success" type="submit">Guardar</button>
            <a class="btn btn-danger" href="/igbj/departamento">
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php include('app/views/components/footer.php'); ?>