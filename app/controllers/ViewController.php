<?php
class ViewController
{
    public function index()
    {
        include('app/views/cargos/cargo_view.php');
    }
    public function registerPerson()
    {
        include('app/views/cargos/cargo_register.php');
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
}
