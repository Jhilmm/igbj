<?php
class PersonnelController
{
    public function index()
    {
        include('app/views/person/person_view.php');
    }
    public function registerPerson()
    {
        include('app/views/person/person_register.php');
    }
    function viewAllPerson($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            $conn = get_connection();
            $query = "SELECT * FROM DB_VIEW_Persona_view";
            $result = $conn->query($query);
            if (!$result) {
                http_response_code(500);
                echo json_encode(['error' => 'Error en la consulta']);
                return;
            }

            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($rows);
        } catch (mysqli_sql_exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error en la conexión a la base de datos: ' . $e->getMessage()]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error en la ejecución de la consulta']);
        } finally {
            if (isset($conn)) {
                $conn->close();
            }
        }
    }
}
