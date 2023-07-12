<?php
class ReplacementController
{
    public function index()
    {        
        include('app/views/replacements/replacement_view.php');                         
    }

    public function view() 
    {
        
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Repuestos_view";
        $result = $conn->query($query);
        $json = array();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                $json[] = array(
                    'NOMREPUESTO' => $row['NOMREPUESTO'],
                    'DETALLEREPUESTO' => $row['DETALLEREPUESTO'],
                    'NOMTIPOREPUESTO' => $row['NOMTIPOREPUESTO'],
                    'FECHA' => $row['FECHA'],
                    'MARCA' => $row['MARCA'],
                    'MODELO' => $row['MODELO'],
                    'CANTIDAD' => $row['CANTIDAD'],
                    'ESTADO' => $row['ESTADO'],
                    'CODREPUESTO' => $row['CODREPUESTO']
                    
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
    }

    public function search() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $repuesto = $_POST['repuesto'];
            $conn = get_connection();
            $query = $query = 'CALL DB_SP_Repuesto_search("'. $repuesto .'")';
            $result = $conn->query($query);
            $json = array();
            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                $json[] = array(
                    'NOMREPUESTO' => $row['NOMREPUESTO'],
                    'DETALLEREPUESTO' => $row['DETALLEREPUESTO'],
                    'NOMTIPOREPUESTO' => $row['NOMTIPOREPUESTO'],
                    'FECHA' => $row['FECHA'],
                    'MARCA' => $row['MARCA'],
                    'MODELO' => $row['MODELO'],
                    'CANTIDAD' => $row['CANTIDAD'],
                    'ESTADO' => $row['ESTADO'],
                    'CODREPUESTO' => $row['CODREPUESTO']
                    
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_rep = $_POST['name_rep'];
            $det_rep = $_POST['det_rep'];
            $fec_ing = $_POST['fec_ing'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $cant = $_POST['cant'];
            $cod_tipo_rep = $_POST['name_tipo_rep'];

            $departamentos = $this->replacement_register($name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,1,$cod_tipo_rep);
            header("Location: /igbj/repuesto");
            exit();
        }else{
            $tipoRep= $this->tipoRep();
            include('app/views/replacements/replacement_register.php');
        }
    }

    public function enable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $repuesto = $_GET['codigo'];          
            $repuesto = $this->enable_replacement($repuesto);
            header("Location: /igbj/repuesto");
            exit();
        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $repuesto = $_GET['codigo'];            
            $repuesto = $this->disable_replacement($repuesto);
            header("Location: /igbj/repuesto");
            exit();
        }
    }

    public function replacement_register($name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,$est_rep, $cod_tipo_rep)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Repuestos_add(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssiii",$name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,$est_rep,$cod_tipo_rep);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cod_rep = $_POST['cod_rep'];
            $name_rep = $_POST['name_rep'];
            $det_rep = $_POST['det_rep'];
            $fec_ing = $_POST['fec_ing'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $cant = $_POST['cant'];
            $cod_tipo_rep = $_POST['name_tipo_rep'];
            $departamentos = $this->repuesto_update($cod_rep,$name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,$cod_tipo_rep);
            header("Location: /igbj/repuesto");
            exit();
        }else{
            $cod_rep = $_GET['repuesto'];            
            $repuestos = $this->viewUpdate($cod_rep);
            $tipoRep= $this->tipoRep();
            include('app/views/replacements/replacement_update.php');
        }
    }

    public function viewUpdate($cod_rep)
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Repuestos_view WHERE CODREPUESTO='" . $cod_rep . "';";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    public function repuesto_update($cod_rep, $name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,$cod_tipo_rep)
{

    $conn = get_connection();
    $stmt = $conn->prepare("CALL DB_SP_Repuestos_update(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("isssssii", $cod_rep, $name_rep, $det_rep, $fec_ing,$marca,$modelo,$cant,$cod_tipo_rep);
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

    public function tipoRep() 
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Tiporepuesto_view";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }



    function searchPersonnel($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT p.APPATERNO, p.APMATERNO, p.NOMBRES, p.CI, p.EXPEDIDOCI,p.FECHANACIMIENTO, pr.PROFESION, p.DIRECCION, p.TELEFONO, p.CELULAR, p.CORREO, p.SEXO
                FROM persona p
                INNER JOIN profesion pr ON p.CODPROFESION = pr.CODPROFESION
                ";
                $result = $conn->query($query);
                if ($result) {
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    header('Content-Type: application/json');
                    echo json_encode($rows);
                }
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error con la base de datos: ' . $e->getMessage()]);
        } finally {
            if (isset($conn)) {
                $conn->close();
            }
        }
    }

    //Funcion para habilitar un cargo
    public function enable_replacement($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Repuestos_enable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar un cargo
    public function disable_replacement($codigo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Repuestos_disable("' . $codigo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
}