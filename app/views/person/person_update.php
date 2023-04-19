<?php include('app/views/components/header.php'); ?>

<div>
    <form action="#" method="post">
        <label for="ci">Cedula de Identidad:</label>
        <input type="text" name="ci" id="ci"><br>

        <label for="exp">Exp:</label>
        <select name="exp" id="exp">
            <option value=""></option>
            <option value="LP">LP</option>
            <option value="CB">CB</option>
            <option value="SC">SC</option>
            <option value="OR">OR</option>
            <option value="PT">PT</option>
            <option value="CH">CH</option>
            <option value="TJ">TJ</option>
            <option value="BN">BN</option>
            <option value="PA">PA</option>
        </select><br>

        <label for="profesion">Profesión:</label>
        <select name="profesion" id="profesion">
            <option value=""></option>
            <option value="Ingeniero">Ingeniero</option>
            <option value="Médico">Médico</option>
            <option value="Abogado">Abogado</option>
            <option value="Arquitecto">Arquitecto</option>
            <option value="Profesor">Profesor</option>
            <option value="Otro">Otro</option>
        </select><br>

        <label for="name">Nombres:</label>
        <input type="text" name="nombres" id="name"><br>

        <label for="apa">Apellido Paterno:</label>
        <input type="text" name="ape_paterno" id="apa"><br>

        <label for="ama">Apellido Materno:</label>
        <input type="text" name="ape_materno" id="ama"><br>

        <label for="date">Fecha de Nacimiento:</label>
        <input type="date" name="fecha" id="date"><br>

        <label for="dir">Dirección:</label>
        <input type="text" name="direccion" id="dir"><br>

        <label for="tel">Teléfono:</label>
        <input type="text" name="telefono" id="tel"><br>

        <label for="cel">Celular:</label>
        <input type="text" name="celular" id="cel"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>

        <input type="submit" value="Enviar">
    </form>

</div>
<?php include('app/views/components/footer.php'); ?>