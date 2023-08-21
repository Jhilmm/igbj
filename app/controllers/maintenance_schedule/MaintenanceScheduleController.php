<?php
class MaintenanceScheduleController
{
    public function index()
    {
        include('app/views/maintenance_schedule/maintenance_schedule_view.php');
    }
    public function registerSchedule()
    {
        include('app/views/maintenance_schedule/prueba.php');
    }

    //Metodo que devuelve todos los datos que coincidan con el departameto y clase de activo
    public function view()
    {
        $departamento = $_POST['departamento'];
        $activo = $_POST['activo'];
        $conn = get_connection();
        $query = 'CALL DB_SP_Departamento_activo("' . $departamento . '","' . $activo . '")';
        $result = $conn->query($query);
        $json = array();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $cronogramas = $this->viewAssetSchedule($row['CODACTIVO']);
            $cronograma = $cronogramas->fetch_array(MYSQLI_BOTH);
            $json[] = array(
                'CODCLASE' => $row['CODCLASE'],
                'CLASE' => $row['CLASE'],
                'NOMCATALOGO' => $row['NOMCATALOGO'],
                'CODCATALOGO' => $row['CODCATALOGO'],
                'CODACTIVO' => $row['CODACTIVO'],
                'DESCRIPCION' => $row['DESCRIPCION'],
                'CODACTIVOFIJO' => $row['CODACTIVOFIJO'],
                'CODPERSONAL' => $row['CODPERSONAL'],
                'CODDEPARTAMENTO' => $row['CODDEPARTAMENTO'],
                'NOMBDEPARTAMENTO' => $row['NOMBDEPARTAMENTO'],
                'CI' => $row['CI'],
                'NOMBRES' => $row['NOMBRES'],
                'APPATERNO' => $row['APPATERNO'],
                'APMATERNO' => $row['APMATERNO'],
                'CODPROFESION' => $row['CODPROFESION'],
                'ABREVIACION' => $row['ABREVIACION'],
                'FECHASALIDA' => $cronograma['FECHASALIDA'],
                'CODCRONOGRAMA'=>$cronograma['CODCRONOGRAMA']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }

    //Metodo que devuelve todos los departamentos habilitados
    public function viewDepartament()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Departamentos_view_habilitados";
        $result = $conn->query($query);
        $json = array();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $json[] = array(
                'CODDEPARTAMENTO' => $row['CODDEPARTAMENTO'],
                'NOMBDEPARTAMENTO' => $row['NOMBDEPARTAMENTO'],
                'DESCRIPCION' => $row['DESCRIPCION'],
                'ESTADO' => $row['ESTADO']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
    //Metodo que devuelve todos los tipos o clases de activos habilitados
    public function viewAsset()
    {
        $conn = get_connection();
        $query = "SELECT * FROM DB_VIEW_Activos_view_habilitados";
        $result = $conn->query($query);
        $json = array();
        while ($row = $result->fetch_array(MYSQLI_BOTH)) {
            $json[] = array(
                'CODCLASE' => $row['CODCLASE'],
                'PARTIDA' => $row['PARTIDA'],
                'CLASE' => $row['CLASE'],
                'DESCRIPCIONCLASE' => $row['DESCRIPCIONCLASE'],
                'ESTADO' => $row['ESTADO']
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    }
    //Metodo para visualizar si existe en el cronograma preventivo un activo y devuelve el mismo
    public function viewAssetSchedule($cod)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Cronograma_preventivo_codactivo("' . $cod . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Metodo para eliminar un cronograma preventivo ya hecho 
    public function deleteSchedule(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $cronograma = $_GET['cronograma'];
            $cronogramas = $this->delete($cronograma);
            header("Location: /igbj/cronograma_mantenimiento");
            exit();
        }
    }

    //Metodo para eliminar un cronograma preventivo registrado
    public function delete($cronograma) {
        $conn = get_connection();
        $query = 'CALL DB_SP_Cronograma_delete("' . $cronograma . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }        
    }
}
