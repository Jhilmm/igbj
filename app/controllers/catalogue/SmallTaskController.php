<?php

class SmallTaskController
{
    public function index()
    {        
        $tarea = $_GET["codTar"];
        $tablas = $this->get_subtarea($tarea);
        $tarea = $this->view($tarea);
        $tarea = $tarea->fetch_array(MYSQLI_BOTH);
        
        include('app/views/smalltasks/smalltask_view.php');                         
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_tarea = $_POST['name_tarea'];
            $name_subtarea= $_POST['name_subtarea'];
            $tarea = $_GET["codTar"];

            $catalogos = $this->smalltask_register($name_tarea, strtoupper($name_subtarea), true);

            header("Location: /igbj/subtarea?codTar=$tarea");
            exit();
        }else{
            $codTar = $_GET["codTar"];
            $tarea = $this->get_tarea($codTar);
            $tarea = $tarea->fetch_array(MYSQLI_BOTH);

            $nomTar = $tarea["NOMTAREA"];

            $codCat = $tarea["CODCATALOGO"];

            $tareas = $this->get_tareas_by_cat($codCat);

            include('app/views/smalltasks/smalltask_register.php');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_tarea    = $_POST['name_tarea'];
            $name_subtarea = $_POST['name_subtarea'];
            $cod_subtarea  = $_POST['codigo'];

            $subtareas = $this->smalltask_update_by_name($cod_subtarea, strtoupper($name_subtarea));
            $subtareas = $this->smalltask_update_by_task($cod_subtarea, $name_tarea);

            header("Location: /igbj/subtarea?codTar=$name_tarea");
            exit();
        }else{
            $cod_subtarea = $_GET["subtarea"];
            $codTarea = $_GET["tarea"];

            $subtarea     = $this->get_smalltask_by_cod($cod_subtarea);
            $subtarea     = $subtarea->fetch_array(MYSQLI_BOTH);

            $tareas = $this->get_tareas_by_cat($subtarea["CODCATALOGO"]);

            include('app/views/smalltasks/smalltask_update.php');
        }
    }

    public function enable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $subtarea  = $_GET['codigo'];
            $codTar = $_GET["codTar"];          
            $subtarea  = $this->enable_smalltask($subtarea);
            header("Location: /igbj/subtarea?codTar=$codTar");
            exit();
        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $subtarea  = $_GET['codigo'];    
            $codTar = $_GET["codTar"];        
            $subtarea  = $this->disable_smalltask($subtarea);
            header("Location: /igbj/subtarea?codTar=$codTar");
            exit();
        }
    }

    //Funcion para habilitar una tarea DB_SP_Subtareas_update_name
    public function enable_smalltask($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Subtareas_enable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar una tarea
    public function disable_smalltask($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Subtareas_disable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_smalltask_by_cod($cod_subtarea){
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Subtareas_view WHERE CODSUBTAREA = '$cod_subtarea'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_task_by_catalogue($cod_catalogo){
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tareas_view WHERE CODCATALOGO=$cod_catalogo";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_subtarea($tarea)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Subtareas_view WHERE CODTAREA = '$tarea'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_tareas_by_cat($codcat)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tareas_view WHERE CODCATALOGO=$codcat";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_tarea($codcat)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tareas_view WHERE CODTAREA = '$codcat'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function view($codcat)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tareas_view WHERE CODTAREA  = '$codcat'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_proveedor()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Provedor_view";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_clase_marca()
{
    $conn = get_connection();
    $query = "SELECT * FROM DB_VIEW_ClaseactivoMarca_view";
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

    function get_clase_marca_by_codclase($id){
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_ClaseactivoMarca_view WHERE CODCLASE='$id'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_clase_marca_by_codmarca($cod_marca)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_ClaseactivoMarca_view WHERE CODMARCA='$cod_marca'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_modelo($id)
{
    $conn = get_connection();
    $query = $query = 'CALL DB_SP_MarcaModelo_search_id("'. $id .'")';
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

    public function smalltask_update_by_name( $codsubtarea, $nameSub)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Subtareas_update_name(?,?)");
        $stmt->bind_param("is", $codsubtarea, $nameSub);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function smalltask_update_by_task( $codsubtarea, $codTarea)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Subtarea_update_tarea(?,?)");
        $stmt->bind_param("ii", $codsubtarea, $codTarea);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function smalltask_register( $codTarea, $nameSub, $estado)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Subtareas_add(?,?,?)");
        $stmt->bind_param("isi", $codTarea, $nameSub, $estado);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
