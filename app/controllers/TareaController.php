<?php

class TareaController
{
    public function index()
    {        
        $catalogo = $_GET["codCat"];
        $tablas = $this->get_tarea($catalogo);
        $catalogo = $this->view($catalogo);
        $catalogo = $catalogo->fetch_array(MYSQLI_BOTH);
        
        include('app/views/tareas/tarea_view.php');                         
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

    public function register_tar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nameClase = $_POST['name_clase'];
            $nameCatal = $_POST['name_catalogo'];
            

            $catalogos = $this->register($nameClase, strtoupper($nameCatal), true);
            header("Location: /igbj/tarea");
            exit();
        }else{
            $clases= $this->get_clase_marca();
            include('app/views/tareass/tarea_register.php');
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
