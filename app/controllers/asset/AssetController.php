<?php

class AssetController
{

    public function index()
    {        
        $activos= $this->view();
        include('app/views/assets/asset_view.php');                         
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $proveedor = $_POST['proveedor'];
            //$clase = $_POST['clase'];
            //$marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $procedencia = $_POST['procedencia'];
            $fabricacion = $_POST['fabricacion'];
            $serie = $_POST['serie'];
            $cod_act = $_POST['cod_act'];
            $fec_ing = $_POST['fec_ing'];
            $descripción = $_POST['descripción'];
            $usuario = $_POST['usuario'];
            $fotografia = addslashes(file_get_contents($_FILES['fotografia']['tmp_name']));
            
            $activos = $this->register_asset($proveedor, $modelo, $descripción, true, $procedencia, $cod_act, $serie, $fabricacion, $fec_ing, $fotografia, $usuario);
            header("Location: /igbj/activo");
            exit();
        }else{
            $proveedores = $this->get_provider();
            $procedencias = $this->get_origin();
            include('app/views/assets/asset_register.php');
        }
    }

    public function enable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $activo = $_GET['codigo'];          
            $activo= $this->enableAsset($activo);
            header("Location: /igbj/activo");
            exit();
        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $activo = $_GET['codigo'];            
            $activo = $this->disableAsset($activo);
            header("Location: /igbj/activo");
            exit();
        }
    }

    //funcion para obtener la tabla activo
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

    
    function get_class()
    {
            $conn = get_connection();
            $query = "SELECT * FROM DB_VIEW_ClaseactivoMarca_view";
            $result = $conn->query($query);
            $json = array();
            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                $json[] = array(
                    'CODCLASE' => $row['CODCLASE'],
                    'CLASE' => $row['CLASE']
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
    }

    function get_mark(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codigo = $_POST['codigoC'];
            $conn = get_connection();
            $query = "SELECT * FROM DB_VIEW_ClaseactivoMarca_view WHERE CODCLASE='$codigo'";
            $result = $conn->query($query);
            $json = array();
            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                $json[] = array(
                    'CODMARCA' => $row['CODMARCA'],
                    'MARCA' => $row['MARCA']
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }

    function get_model(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codigo = $_POST['codigoMo'];
            $conn = get_connection();
            $query = $query = 'CALL DB_SP_MarcaModelo_search_id("'. $codigo .'")';
            $result = $conn->query($query);
            $json = array();
            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                $json[] = array(
                    'CODMODELO' => $row['CODMODELO'],
                    'MODELO' => $row['MODELO']
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
    
    function get_provider()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Provedor_view";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    function get_origin()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Procedencia_view";
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

//metodo para registrar activo en la base de datos
/*
    public function register_asset($proveedor, $modelo, $descripción, $estado, $procedencia, $cod_act, $serie, $fabricacion, $fec_ing, $fotografia, $usuario)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Activo_add(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sisiississi", $proveedor, $modelo, $descripción, $estado, $procedencia, $cod_act, $serie, $fabricacion, $fec_ing, $fotografia, $usuario);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }*/

    function register_asset( $proveedor, $modelo, $descripción, $estado, $procedencia, $cod_act, $serie, $fabricacion, $fec_ing, $fotografia, $usuario)
{
    $conn = get_connection();
    $query = "INSERT INTO activo (NITPROVEEDOR, CODMODELO, DESCRIPCION, ESTADOACTIVO, CODPROCEDENCIA, CODACTIVOFIJO, SERIE, ANIOFABRICACION, FECHAINGRESO, FOTOGRAFIA, USUARIOREGISTRO) values 
                                   ('$proveedor ','$modelo ','$descripción','$estado','$procedencia','$cod_act','$serie','$fabricacion','$fec_ing','$fotografia','$usuario');
";
    if ($result = $conn->query($query)) {
        return $result;
    } else {
        return null;
    }
}

    //Funcion para habilitar un departamento
    public function enableAsset($cod_act)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Activo_enable("' . $cod_act . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar un departamento
    public function disableAsset($cod_act)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Activo_disable("' . $cod_act . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
}

/**<?php foreach ($clases as $clase): 
                    if($clase['CODCLASE']===$classes){
                        echo '<option selected value=' . $clase['CODCLASE'] . '>' . $clase["CLASE"] . '</option>';
                    }else{
                        echo '<option value=' . $clase['CODCLASE'] . '>'. $clase["CLASE"] . '</option>';
                    }    
                  endforeach; ?>
                  ---------
                  
                  
*/
