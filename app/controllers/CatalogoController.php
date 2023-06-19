<?php

class CatalogoController
{
    public function index()
    {        
        //$catalogos = $this->view();
        $clases= $this->get_clase_marca();
        $tabla = "0";
        if(isset($_GET["clase"])){
            $tabla = $_GET["clase"];
            $codClase = $tabla;
        }
        $tablas = $this->view($tabla);
        include('app/views/catalogos/catalogo_view.php');                         
    }

    function view($tabla)
{
    $conn = get_connection();
    $query = "SELECT * FROM DB_VIEW_CatalogoAll_view WHERE CODCLASE='$tabla'";
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

    public function register_cat()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nameClase = $_POST['name_clase'];
            $nameCatal = $_POST['name_catalogo'];
            

            $catalogos = $this->register($nameClase, strtoupper($nameCatal), true);
            header("Location: /igbj/catalogo");
            exit();
        }else{
            $clases= $this->get_clase_marca();
            include('app/views/catalogos/catalogo_register.php');
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nameClase = $_POST['name_clase'];
            $nameCatal = $_POST['name_catalogo'];
            $codCatalogo = $_POST['cod_catalogo'];

            //$catalogos = $this->register($nameClase, strtoupper($nameCatal), true);
            $catalogos = $this->catalogo_update( $codCatalogo, $nameClase, strtoupper($nameCatal));
            header("Location: /igbj/catalogo");
            exit();
        }else{
            $codigo = $_GET["codigo"];
            $codClase = $_GET["clase"];
            $clases= $this->get_clase_marca();

            $catalogo = $this->get_catalogo_by_cod($codigo);
            $catalogo = $catalogo->fetch_array(MYSQLI_BOTH);
            include('app/views/catalogos/catalogo_update.php');
        }
    }

    function catalogo_update( $codCatalogo, $codClase, $nomCat)
{

    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_Catalogo_update(?,?,?)");
    $stmt->bind_param("iis", $codCatalogo, $codClase, $nomCat);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
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

    function get_catalogo_by_cod($catalog)
{
    $conn = get_connection();
    $query = "SELECT NOMCATALOGO FROM DB_VIEW_CatalogoAll_view WHERE CODCATALOGO='$catalog'";
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
