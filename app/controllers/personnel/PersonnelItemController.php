<?php
class PersonnelItemController
{
    public function assignItemView()
    {
        include('app/views/personnel/item_assign.php');
    }
    public function changeItemView()
    {
        include('app/views/personnel/item_update.php');
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

    public function updateItemAssigned($postData)
    {
        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Personal_update(?,?,?)");
                $cod = intval($postData['personnel_id']);
                $date = (new DateTime($postData['date']))->format('Y-m-d');
                $item = mysqli_real_escape_string($conn, $postData['item']);
                $stmt->bind_param(
                    "isi",
                    $cod,
                    $date,
                    $item
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
    function hasItemAssigned($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }
        try {
            if ($conn = get_connection()) {
                $query = "SELECT CODPERSONAL,CODITEM,CI,FECHAASIGNACION
                FROM DB_VIEW_Personal_view
                WHERE CI = '" . $postData['num_ci'] . "'";
                $result = $conn->query($query);
                if ($result = $conn->query($query)) {
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                    http_response_code(200);
                    header('Content-Type: application/json');
                    if (sizeof($rows) == 0) {
                        $rows[] = array("hasItem" => false);
                    } else {
                        $rows[0]["hasItem"] = true;
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
}