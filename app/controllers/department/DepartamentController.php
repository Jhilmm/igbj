<?php
class DepartamentController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $departamento = $_POST['name_depa'];         
            $departamentos = $this->search($departamento);
            include('app/views/departament/departament_view.php');
            exit();        
        }else{
            $departamentos = $this->view();
            include('app/views/departament/departament_view.php');
        }                 
    }    
    
    public function registerDepartament()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre_departamento = $_POST['name_depa'];
            $descripcion_departamento = $_POST['des_depa'];
            $departamentos = $this->register($nombre_departamento,$descripcion_departamento,1);
            header("Location: /igbj/departamento");
            exit();
        }else{
            include('app/views/departament/departament_register.php');
        }        
    }  

    public function updateDepartament()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codigo_departamento = $_POST['cod_depa'];
            $nombre_departamento = $_POST['name_depa'];
            $descripcion_departamento = $_POST['des_depa'];
            $departamentos = $this->update($codigo_departamento,$nombre_departamento,$descripcion_departamento);
            header("Location: /igbj/departamento");
            exit();
        }else{
            $departamento = $_GET['departamento'];            
            $departamentos = $this->viewUpdate($departamento);
            include('app/views/departament/departament_update.php');
        }
    }

    public function enableDepartament()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $departamento = $_GET['departamento'];            
            $departamentos = $this->enable($departamento);
            header("Location: /igbj/departamento");
            exit();
        }
    }

    public function disableDepartament()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $departamento = $_GET['departamento'];            
            $departamentos = $this->disable($departamento);
            header("Location: /igbj/departamento");
            exit();
        }
    }

    //Funcion para obtener todos los registros de departaamento para mostrar
    public function view() 
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_DepartamentosAll_view";
        if ($result = $conn->query($query)) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }
    }

    //Funcion para obtener el registro buscado
    public function search($name_depa) 
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Departamentos_search("' . $name_depa . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para guardar los registros de departaamento en la base de datos
    public function register($name_depa, $des_depa, $est_depa)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Departamentos_add(?,?,?)");
        $stmt->bind_param("ssi",$name_depa, $des_depa, $est_depa );
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    //Funcion para mostrar los datos de un departaamento especifico
    public function viewUpdate($name_depa)
    {
        $conn = get_connection();
        $query = "SELECT * FROM departamentos WHERE NOMBDEPARTAMENTO='" . $name_depa . "';";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para actualizar los datos de un departaamento especifico
    public function update($cod_depa,$name_depa,$des_depa)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Departamentos_update(?,?,?)");
        $stmt->bind_param("iss",$cod_depa, $name_depa,$des_depa);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    //Funcion para habilitar un departamento
    public function enable($name_depa)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Departamentos_enable("' . $name_depa . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar un departamento
    public function disable($name_depa)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Departamentos_disable("' . $name_depa . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
}
