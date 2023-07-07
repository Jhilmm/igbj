<?php
class AssetItemController
{
    function getResponsible()
    {
        $conn = get_connection();
        $query = 'SELECT NOMBRES,APPATERNO,APMATERNO,CARGO,CODASIGCARGOPER   
        FROM DB_VIEW_Ordentrabajo_ResponsableActivo_view';
        $result = $conn->query($query);
        $json = array();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $json[] = array(
                'nombres' => $row['NOMBRES'],
                'apa' => $row['APPATERNO'],
                'ama' => $row['APMATERNO'],
                'cargo' => $row['CARGO'],
                'cod_acp' => $row['CODASIGCARGOPER']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }

    function getActivo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cod_acp = $_POST['cod_acp'];
            $conn = get_connection();
            $query = 'CALL DB_SP_Asigcargopersonal_ViewActivos("' . $cod_acp . '")';
            $result = $conn->query($query);
            $json = array();
            while ($row = $result->fetch_array(MYSQLI_BOTH)) {
                $json[] = array(
                    'cod_activo' => $row['CODACTIVO'],
                    'descripcion' => $row['DESCRIPCION']
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    }
}