<?php

class ActivoController
{
    public function index()
    {        
        $activos= $this->view();
        include('app/views/activos/activo_view.php');                         
    }

    public function view() 
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Activo_view";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    public function register_act()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_rep = $_POST['name_rep'];
            $det_rep = $_POST['det_rep'];
            $fec_ing = $_POST['fec_ing'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $cant = $_POST['cant'];
            $cod_tipo_rep = $_POST['name_tipo_rep'];

            $departamentos = $this->register($name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,1,$cod_tipo_rep);
            header("Location: /igbj/repuesto");
            exit();
        }else{
            $proveedor= $this->get_proveedor();
            $clases= $this->get_clase_marca();
            $classes = "0";
            $marcca = "0";
            if(isset($_GET["clase"])){
                $classes = $_GET["clase"];
                $marcas = $this->get_clase_marca_by_codclase($classes);
                $row= $marcas->fetch_array(MYSQLI_BOTH);
                $modelos = $this->get_modelo($row["CODMARCA"]);
            }
            if(isset($_GET["marca"])){
                $marcca = $_GET["marca"];
            }
            
            $uno = 1;
            //$clases= $this->get_clase_marca_by_codclase($uno);
            include('app/views/activos/activo_register.php');
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

    public function register($name_depa, $cargo, $est_cargo)
    {
        $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_Cargo_add(?,?,?)");
    $stmt->bind_param("isi",$name_depa, $cargo, $est_cargo );
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
    }  

}
