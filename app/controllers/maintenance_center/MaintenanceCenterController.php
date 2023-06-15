<?php
class MaintenanceCenterController
{
    public function index()
    {
        include('app/views/maintenance_center/view.php');
    }

    function searchMaintenanceCenter($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $result = null;
                $rows = array();
                if (isset($postData["search_term"])) {
                    $query = "CALL DB_SP_Centromantenimiento_search(?)";
                    $stmt = mysqli_prepare($conn, $query);
                    $search_param = $postData["search_term"];
                    mysqli_stmt_bind_param($stmt, "s", $search_param);
                    mysqli_stmt_execute($stmt);
                    if ($result = mysqli_stmt_get_result($stmt)) {
                        while ($row = $result->fetch_assoc()) {
                            $rows[] = $row;
                        }
                    }
                }
                header('Content-Type: application/json');
                echo json_encode($rows);
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
    function enableDisableMaintenanceCenter($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $rows = array();
                if (isset($postData["row_id"]) && isset($postData["state"])) {
                    (($postData["state"] == 1) ? $query = "CALL DB_SP_Centromantenimiento_disable(?)" : $query = "CALL DB_SP_Centromantenimiento_enable(?)");
                    $stmt = mysqli_prepare($conn, $query);
                    $search_param = $postData["row_id"];
                    mysqli_stmt_bind_param($stmt, "s", $search_param);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        header('Content-Type: application/json');
                        echo json_encode($rows);
                    }
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
    function registerCenterView()
    {
        include('app/views/maintenance_center/register.php');
    }
    function ActionRegisterCenter($postData)
    {
        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Centromantenimiento_add(?,?,?)");
                $name = mysqli_real_escape_string($conn, $postData['name_center']);
                $state = mysqli_real_escape_string($conn, $postData['state']);
                $description = mysqli_real_escape_string($conn, $postData['description']);
                $stmt->bind_param(
                    "sis",
                    $name,
                    $state,
                    $description
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
    function updateCenterView()
    {
        include('app/views/maintenance_center/update.php');
    }
    function actionSearchCenter($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }
        try {
            if ($conn = get_connection()) {
                $query = "SELECT CENTROMANTENIMIENTO, DESCRIPCION
                FROM DB_VIEW_Centromantenimiento_view
                WHERE CODCENTRO=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $postData['center_id']);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
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
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }
    function actionUpdateCenter($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }
        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Centromantenimiento_update(?,?,?)");
                $name = mysqli_real_escape_string($conn, $postData['name_center']);
                $cod = mysqli_real_escape_string($conn, $postData['center_id']);
                $description = mysqli_real_escape_string($conn, $postData['description']);
                $stmt->bind_param(
                    "sis",
                    $name,
                    $cod,
                    $description
                );
                if ($stmt->execute()) {
                    $response = array("message" => "Actualizacion exitosa");
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
    function viewTechniciansCenter()
    {
        include('app/views/maintenance_center/view_technician_center.php');
    }
    function actionSearchTechnicianCenter($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }
        try {
            if ($conn = get_connection()) {
                $result = null;
                $rows = array();
                if (isset($postData["search_term"])) {
                    $query = "CALL DB_SP_TecnicosdelCentro_search(?,?)";
                    $stmt = mysqli_prepare($conn, $query);
                    $id_center = $postData["center_id"];
                    $search_param = $postData["search_term"];
                    mysqli_stmt_bind_param($stmt, "is", $id_center, $search_param);
                    mysqli_stmt_execute($stmt);
                    if ($result = mysqli_stmt_get_result($stmt)) {
                        while ($row = $result->fetch_assoc()) {
                            $rows[] = $row;
                        }
                    }
                }
                header('Content-Type: application/json');
                echo json_encode($rows);
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
    function enableDisableTechnicianCenter($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $rows = array();
                if (isset($postData["row_id"]) && isset($postData["state"])) {
                    (($postData["state"] == 1) ? $query = "CALL DB_SP_Tecnicos_disable(?)" : $query = "CALL DB_SP_Tecnicos_enable(?)");
                    $stmt = mysqli_prepare($conn, $query);
                    $search_param = $postData["row_id"];
                    mysqli_stmt_bind_param($stmt, "s", $search_param);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                        header('Content-Type: application/json');
                        echo json_encode($rows);
                    }
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
    function viewTechnicianAssignCenter()
    {
        include('app/views/maintenance_center/view_assign_technician.php');
    }
    function actionAssignSearchTechnician($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $result = null;
                $rows = array();
                if (isset($postData["search_term"])) {
                    $query = "CALL DB_SP_Tecnicos_search(?)";
                    $stmt = mysqli_prepare($conn, $query);
                    $search_param = $postData["search_term"];
                    mysqli_stmt_bind_param($stmt, "s", $search_param);
                    mysqli_stmt_execute($stmt);
                    if ($result = mysqli_stmt_get_result($stmt)) {
                        while ($row = $result->fetch_assoc()) {
                            $rows[] = $row;
                        }
                    }
                }
                header('Content-Type: application/json');
                echo json_encode($rows);
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
    function actionAssignTechnician($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }
        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Tecnicos_add(?,?)");
                $personnel_assign_id = mysqli_real_escape_string($conn, $postData['assign_id']);
                $center_id = mysqli_real_escape_string($conn, $postData['center_id']);
                error_log('el id del personal es: ' . $postData['assign_id']);
                error_log('el cod del centro de mantenimeinto es: ' . $postData['center_id']);
                $stmt->bind_param(
                    "ii",
                    $personnel_assign_id,
                    $center_id
                );
                if ($stmt->execute()) {
                    $response = array("message" => "Tecnico asignado a centro de mantenimiento exitoso");
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
}