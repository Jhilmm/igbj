<?php

class PostController
{
    public function index()
    {        
        $cargos= $this->view();
        include('app/views/posts/post_view.php');                         
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_depa = $_POST['name_depa'];
            $cargo = $_POST['cargo'];
            $departamentos = $this->register_post($name_depa,$cargo,1);
            header("Location: /igbj/cargo");
            exit();
        }else{
            $depas= $this->get_depa();
            include('app/views/posts/post_register.php');
        }        
    }

    public function enable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $cargo = $_GET['cargo'];          
            $cargo = $this->enablePost($cargo);
            header("Location: /igbj/cargo");
            exit();
        }
    }

    public function disable()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $cargo = $_GET['cargo'];            
            $cargo = $this->disablePost($cargo);
            header("Location: /igbj/cargo");
            exit();
        }
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

    public function register_post($name_depa, $cargo, $est_cargo)
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

    //Funcion para habilitar un cargo
    public function enablePost($cargo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Cargo_enable("' . $cargo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar un cargo
    public function disablePost($cargo)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Cargo_disable("' . $cargo . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
}
