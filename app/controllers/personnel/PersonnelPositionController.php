<?php
class PersonnelPositionController
{
    public function assignPositionView()
    {
        include('app/views/personnel/position_assign.php');
    }
    public function updatePositionView()
    {
        include('app/views/personnel/position_update.php');
    }
    public function changeItemView()
    {
        include('app/views/person/person_item_update.php');
    }
    public function assignItem($postData)
    {

        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Personal_add(?,?,?,1)");
                $item = mysqli_real_escape_string($conn, $postData['item']);
                $num_ci = mysqli_real_escape_string($conn, $postData['num_ci']);
                $date = (new DateTime($postData['date']))->format('Y-m-d');
                $stmt->bind_param(
                    "sss",
                    $item,
                    $num_ci,
                    $date
                );
                if ($stmt->execute()) {
                    $response = array("message" => "Registro exitoso");
                    $contentType = 'Content-Type: application/json';
                    header($contentType);
                    http_response_code(200);
                    echo json_encode($response);
                }
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error con la base de datos: ' . $e->getMessage()]);
        } finally {
            if (isset($conn)) {
                $conn->close();
            }
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    public function assignPosition($postData)
    {
        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_AsigCargoPersonal_add(?,?,?,?)");
                $cod_position = intval($postData['position']);
                $cod_personnel = intval($postData['personnel_id']);
                $date = (new DateTime($postData['date']))->format('Y-m-d');
                $memo = mysqli_real_escape_string($conn, $postData['cod_memo']);
                $stmt->bind_param(
                    "iiss",
                    $cod_position,
                    $cod_personnel,
                    $date,
                    $memo
                );
                if ($stmt->execute()) {
                    $response = array("message" => "Asignacion de cargo exitoso");
                    header('Content-Type: application/json');
                    http_response_code(200);
                    echo json_encode($response);
                }
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error con la base de datos: ' . $e->getMessage()]);
        } finally {
            if (isset($conn)) {
                $conn->close();
            }
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    public function updatePositionAssigned($postData)
    {
        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_AsigCargoPersonal_update(?,?,?,?)");
                $id = intval($postData['id']);
                $cod_position = intval($postData['position']);
                $date = (new DateTime($postData['date']))->format('Y-m-d');
                $memo = mysqli_real_escape_string($conn, $postData['cod_memo']);
                $stmt->bind_param(
                    "iiss",
                    $id,
                    $cod_position,
                    $date,
                    $memo
                );
                if ($stmt->execute()) {
                    $response = array("message" => "Actualizacion exitosa");
                    header('Content-Type: application/json');
                    http_response_code(200);
                    echo json_encode($response);
                }
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error con la base de datos: ' . $e->getMessage()]);
        } finally {
            if (isset($conn)) {
                $conn->close();
            }
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    function get_all_items($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT * FROM DB_VIEW_Item_Available_view";
                $result = $conn->query($query);
                if ($result = $conn->query($query)) {
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
    function hasPositionAssigned($postData)
    {
        try {
            if ($conn = get_connection()) {
                $query = "SELECT acp.CODASIGCARGOPER, p.CODITEM 
                FROM `DB_VIEW_AsigCargoPersonal_view` acp
                JOIN personal p ON p.CODPERSONAL = acp.CODPERSONAL
                WHERE p.CI = '" . $postData['num_ci'] . "'";
                $result = $conn->query($query);
                if ($result = $conn->query($query)) {
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    http_response_code(200);
                    header('Content-Type: application/json');
                    if (sizeof($rows) == 0) {
                        $rows[] = array("hasPosition" => false);
                    } else {
                        $rows[0]["hasPosition"] = true;
                    }
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
    function searchPosition($postData)
    {
        try {
            if ($conn = get_connection()) {
                $query = "SELECT c.CODCARGO, dep.CODDEPARTAMENTO, acp.FECHAASIGNACION, acp.MEMODESIGNACION
                FROM `DB_VIEW_AsigCargoPersonal_view` acp
                JOIN cargo c ON c.CODCARGO=acp.CODCARGODEP
                JOIN departamentos dep ON dep.CODDEPARTAMENTO=c.CODDEPARTAMENTO
                WHERE acp.CODASIGCARGOPER = '" . $postData['assign_position_id'] . "'";
                $result = $conn->query($query);
                if ($result = $conn->query($query)) {
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    http_response_code(200);
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
    function get_all_departments()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT * FROM DB_VIEW_Departamentos_view";
                $result = $conn->query($query);
                if ($result = $conn->query($query)) {
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
    function get_all_position($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT *
                FROM DB_VIEW_Cargo_view
                WHERE CODDEPARTAMENTO = '" . $postData["cod_department"] . "'";
                $result = $conn->query($query);
                if ($result = $conn->query($query)) {
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