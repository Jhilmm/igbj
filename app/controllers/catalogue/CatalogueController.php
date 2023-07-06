<?php

class CatalogueController
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
        include('app/views/catalogs/catalogue_view.php');                         
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

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nameClase = $_POST['name_clase'];
            $nameCatal = $_POST['name_catalogo'];
            

            $catalogos = $this->catalogue_register($nameClase, strtoupper($nameCatal), true);
            header("Location: /igbj/catalogo");
            exit();
        }else{
            $clases= $this->get_clase_marca();
            include('app/views/catalogs/catalogue_register.php');
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
            include('app/views/catalogs/catalogue_update.php');
        }
    }

    public function enable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $catalogo = $_GET['codigo'];
            $clase    = $_GET["clase"];          
            $catalogo = $this->enable_catologue($catalogo);
            header("Location: /igbj/catalogo?clase=$clase");
            exit();
        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $catalogo = $_GET['codigo'];    
            $clase    = $_GET["clase"];        
            $catalogo = $this->disable_catalogue($catalogo);
            header("Location: /igbj/catalogo?clase=$clase");
            exit();
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

    public function catalogue_register( $codClase, $nomCat, $estado)
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

    //Funcion para habilitar un cargo
    public function enable_catologue($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Catalogo_enable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar un cargo
    public function disable_catalogue($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Catalogo_disable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
}
