<?php
class AssignAssetController
{
    public function index()
    {
        include('app/views/assign_assets/view.php');
    }
    public function searchResponsiblePersonnelWithAssetAssignment()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT CONCAT(per.NOMBRES, per.APPATERNO, per.APMATERNO) AS NOMBRE_COMPLETO, c.CARGO, d.NOMBDEPARTAMENTO, acp.CODASIGCARGOPER
                FROM asigcargopersonal acp
                JOIN personal p ON acp.CODPERSONAL = p.CODPERSONAL
                JOIN persona per ON p.CI = per.CI
                JOIN cargo c ON acp.CODCARGODEP = c.CODCARGO
                JOIN departamentos d ON c.CODDEPARTAMENTO = d.CODDEPARTAMENTO
                WHERE acp.ESTADO = 1;";
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
    public function searchAssignedAssets($postData)
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
                if (isset($postData["search_term"]) && isset($postData["cod_assign_cargo_personnel"])) {
                    $query = "CALL DB_SP_AsignacionActivo_search(?,?)";
                    $stmt = mysqli_prepare($conn, $query);
                    $cod_assign_cargo_personnel = $postData["cod_assign_cargo_personnel"];
                    $search_param = $postData["search_term"];
                    mysqli_stmt_bind_param($stmt, "is", $cod_assign_cargo_personnel, $search_param);
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
}