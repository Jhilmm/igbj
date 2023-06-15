<?php

class SubtareaController
{
    public function index()
    {        
        $tarea = $_GET["codTar"];
        $tablas = $this->get_subtarea($tarea);
        $tarea = $this->view($tarea);
        $tarea = $tarea->fetch_array(MYSQLI_BOTH);
        
        include('app/views/subtareas/subtarea_view.php');                         
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

    public function register_sub()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nameClase = $_POST['name_clase'];
            $nameCatal = $_POST['name_catalogo'];
            

            $catalogos = $this->register($nameClase, strtoupper($nameCatal), true);
            header("Location: /igbj/catalogo");
            exit();
        }else{
            $codTar = $_GET["codTar"];
            $tareas = $this->get_tareas_by_cat($codTar);
            include('app/views/subtareas/subtarea_register.php');
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

    public function register( $codClase, $nomCat, $estado)
    {
        $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_Catalogo_add(?,?,?)");
    $stmt->bind_param("isi",$codClase, $nomCat, $estado );
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
    }
}
