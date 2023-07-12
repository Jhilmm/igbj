<?php
class ProviderController
{
    public function index()
    {
        include('app/views/provider/provider_view.php');
    }
    public function search()
    {
        $proveedor = $_POST['send_dato'];

        $conn = get_connection();
        $query = 'CALL DB_SP_Proveedor_search("' . $proveedor . '")';
        $result = $conn->query($query);
        $json = array();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $json[] = array(
                'NIT' => $row['NIT'],
                'NOMPROVEEDOR' => $row['NOMPROVEEDOR'],
                'DIRECCION' => $row['DIRECCION'],
                'TELEFONOPROVEEDOR' => $row['TELEFONOPROVEEDOR'],
                'CONTACTO' => $row['CONTACTO'],
                'CELULARCONTACTO' => $row['CELULARCONTACTO'],
                'CORREOCONTACTO' => $row['CORREOCONTACTO'],
                'ESTADO' => $row['ESTADO']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }

    public function registerProvider()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nit = $_POST['nit'];
            $nombre = $_POST['name_pro'];
            $direccion = $_POST['dir_pro'];
            $telefono = $_POST['tel_pro'];
            $contacto = $_POST['cont_pro'];
            $correo = $_POST['correo_pro'];
            $celular = $_POST['cel_pro'];
            $proveedores = $this->register($nit, $nombre, $direccion, $telefono, $contacto, $correo, $celular, 1);
            header("Location: /igbj/proveedor");
            exit();
        } else {
            include('app/views/provider/provider_register.php');
        }
    }

    public function updateProvider()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nit = $_POST['nit'];
            $nombre = $_POST['name_pro'];
            $direccion = $_POST['dir_pro'];
            $telefono = $_POST['tel_pro'];
            $contacto = $_POST['cont_pro'];
            $correo = $_POST['correo_pro'];
            $celular = $_POST['cel_pro'];
            $proveedores = $this->update($nit, $nombre, $direccion, $telefono, $contacto, $correo, $celular);
            header("Location: /igbj/proveedor");
            exit();
        } else {
            $proveedor = $_GET['proveedor'];
            $proveedores = $this->viewUpdate($proveedor);
            include('app/views/provider/provider_update.php');
        }
    }

    public function enableProvider()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $proveedor = $_GET['proveedor'];
            $proveedores = $this->enable($proveedor);
            header("Location: /igbj/proveedor");
            exit();
        }
    }

    public function disableProvider()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $proveedor = $_GET['proveedor'];
            $proveedores = $this->disable($proveedor);
            header("Location: /igbj/proveedor");
            exit();
        }
    }

    //Funcion para guardar los registros de proveedor en la base de datos
    public function register($nit, $name, $dir, $tel, $cont, $coreo, $cel, $estado)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Proveedor_add(?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ississii", $nit, $name, $dir, $tel, $cont, $coreo, $cel, $estado);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    //Funcion para mostrar los datos de un proveedor especifico
    public function viewUpdate($nit)
    {
        $conn = get_connection();
        $query = "SELECT * FROM proveedor WHERE NIT='" . $nit . "';";
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para actualizar los datos de un proveedor especifico
    public function update($nit, $name, $dir, $tel, $cont, $coreo, $cel)
    {
        $conn = get_connection();
        $stmt = $conn->prepare("CALL DB_SP_Proveedor_update(?,?,?,?,?,?,?)");
        $stmt->bind_param("ississi", $nit, $name, $dir, $tel, $cont, $coreo, $cel);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    //Funcion para habilitar un proveedor
    public function enable($nit)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Proveedor_enable("' . $nit . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para deshabilitar un proveedor
    public function disable($nit)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Proveedor_disable("' . $nit . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
}
