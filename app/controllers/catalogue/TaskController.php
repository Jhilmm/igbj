<?php

class TaskController
{
    public function index()
    {        
        $catalogo = $_GET["codCat"];
        $codCat = $catalogo;
        $tablas = $this->get_tarea($catalogo);
        $catalogo = $this->view($catalogo);
        $catalogo = $catalogo->fetch_array(MYSQLI_BOTH);
        
        include('app/views/tasks/task_view.php');                         
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name_cata = $_POST['name_cata'];
            $name_tarea = $_POST['name_tarea'];
            

            $catalogos = $this->task_register($name_cata, strtoupper($name_tarea), true);
            
            header("Location: /igbj/tarea?codCat=$name_cata");
            exit();
        }else{
            $codCatalogo = $_GET["codCat"];
            $catalogos = $this->get_catalogo();
            include('app/views/tasks/task_register.php');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name_cata = $_POST['name_cata'];
            $name_tarea = $_POST['name_tarea'];
            $cod_tar    = $_POST['codigo'];

            $catalogos = $this->task_update($cod_tar, strtoupper($name_tarea), $name_cata);
            
            header("Location: /igbj/tarea?codCat=$name_cata");
            exit();
        }else{
            $cod_tar     = $_GET["tarea"];
            $codCatalogo = $_GET["codCat"];
            $tarea       = $this->get_task_by_cod($cod_tar);
            $tarea = $tarea->fetch_array(MYSQLI_BOTH);
            
            $catalogos   = $this->get_catalogo();
            include('app/views/tasks/task_update.php');
        }
    }

    public function enable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $tarea  = $_GET['codigo'];
            $codCat = $_GET["codCat"];          
            $tarea  = $this->enable_task($tarea);
            header("Location: /igbj/tarea?codCat=$codCat");
            exit();
        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $tarea  = $_GET['codigo'];    
            $codCat = $_GET["codCat"];        
            $tarea  = $this->disable_task($tarea);
            header("Location: /igbj/tarea?codCat=$codCat");
            exit();
        }
    }

    //Funcion para habilitar una tarea
    public function enable_task($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Tareas_enable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar una tarea
    public function disable_task($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Tareas_disable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function view($codcat)
    {

        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_CatalogoAll_view WHERE CODCATALOGO='$codcat'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }

    }

    function get_tarea($codcat)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tareas_view WHERE CODCATALOGO = '$codcat'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_task_by_cod($cod_tar){
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tareas_view WHERE CODTAREA = '$cod_tar'";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_catalogo()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_CatalogoAll_view";
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

    public function task_register( $cod_cata, $name_tarea, $estado)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Tareas_add(?,?,?)");
        $stmt->bind_param("sii", $name_tarea, $estado, $cod_cata);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function task_update( $cod_tar, $name_tarea, $cod_cata)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Tarea_update(?,?,?)");
        $stmt->bind_param("isi", $cod_tar, $name_tarea, $cod_cata);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
