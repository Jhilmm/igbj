<?php

class CargoController
{
    public function index()
    {        
        $cargos= $this->view();
        include('app/views/cargos/cargo_view.php');                         
    }

    public function view() 
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_CargoAlll_view";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    public function registerCargo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_depa = $_POST['name_depa'];
            $cargo = $_POST['cargo'];
            $departamentos = $this->register($name_depa,$cargo,1);
            header("Location: /igbj/cargo");
            exit();
        }else{
            $depas= $this->get_depa();
            include('app/views/cargos/registrar_cargo.php');
        }        
    }

    function get_depa()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Departamentos_view WHERE ESTADO=1";
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
