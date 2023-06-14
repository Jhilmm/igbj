<?php


class ActivoController
{
    function obtenerDepartamentos() {
        include '../config/config.php';

        $query = "SELECT * FROM ubdepartamento";
        $result = mysqli_query($connection, $query);

        $json = array();
        
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'codDepartamento' => $row['idDepa'],
                'nomDepartamento' => $row['departamento'],
            );
        }  

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    function obtenerProvincias($id){
        include '../config/config.php';
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_ClaseactivoMarca_view WHERE CODCLASE='$id'";
        if ($result = $conn->query($query)) {
            $json = array();
            //return $result;
            while($row = mysqli_fetch_array($result)) {
                $json[] = array(
                    'codProvincia' => $row['CODMARCA'],
                    'nomProvincia' => $row['MARCA'],
                );
            }
    
            $jsonstring = json_encode($json);
            echo $jsonstring;
        } else {
            //return null;
        }
    }
/*
    function obtenerProvincias($codDepartamento) {
        include '../config/config.php';

        $query = "SELECT * FROM ubprovincia WHERE idDepa = $codDepartamento";
        $result = mysqli_query($connection, $query);

        $json = array();
        
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'codProvincia' => $row['idProv'],
                'nomProvincia' => $row['provincia'],
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }*/

    function obtenerDistritos($codProvincia) {
        include '../assets/db/db.php';

        $query = "SELECT * FROM ubdistrito WHERE idProv = $codProvincia";
        $result = mysqli_query($connection, $query);

        $json = array();
        
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'codDistrito' => $row['idDist'],
                'nomDistrito' => $row['distrito'],
            );
        }  

        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
}

    if( isset($_POST['codigoDepar']) ) {
        $codDepartamento = $_POST['codigoDepar'];
        obtenerProvincias($codDepartamento);
    } else if( isset($_POST['codigoProv']) ) {
        $codProvincia = $_POST['codigoProv'];
        obtenerDistritos($codProvincia);
    } else {
        obtenerDepartamentos();
    }
    
?>