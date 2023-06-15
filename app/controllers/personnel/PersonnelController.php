<?php
class PersonnelController
{
    public function index()
    {
        include('app/views/personnel/view.php');
    }
    public function registerPersonView()
    {
        include('app/views/personnel/register.php');
    }
    public function registerPerson($postData)
    {

        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Persona_add(?,?,?,?,?,?,?,?,?,?,?,?)");
                $num_ci = mysqli_real_escape_string($conn, $postData['num_ci']);
                $profession = intval($postData['profession']);
                $name = mysqli_real_escape_string($conn, $postData['name']);
                $lastname = mysqli_real_escape_string($conn, $postData['lastname']);
                $second_lastname = mysqli_real_escape_string($conn, $postData['second_lastname']);
                $date = (new DateTime($postData['date']))->format('Y-m-d');
                $address = mysqli_real_escape_string($conn, $postData['address']);
                $phone = mysqli_real_escape_string($conn, $postData['phone']);
                $email = mysqli_real_escape_string($conn, $postData['email']);
                $cell_phone = mysqli_real_escape_string($conn, $postData['cell_phone']);
                $gender = mysqli_real_escape_string($conn, $postData['gender']);
                $ci_expedition = mysqli_real_escape_string($conn, $postData['ci_expedition']);
                $stmt->bind_param(
                    "sissssssssss",
                    $num_ci,
                    $profession,
                    $name,
                    $lastname,
                    $second_lastname,
                    $date,
                    $address,
                    $phone,
                    $email,
                    $cell_phone,
                    $gender,
                    $ci_expedition
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
    public function updatePerson($postData)
    {

        try {
            if ($conn = get_connection()) {
                $stmt = $conn->prepare("CALL DB_SP_Persona_update(?,?,?,?,?,?,?,?,?,?,?,?)");
                $num_ci = mysqli_real_escape_string($conn, $postData['num_ci']);
                $profession = intval($postData['profession']);
                $name = mysqli_real_escape_string($conn, $postData['name']);
                $lastname = mysqli_real_escape_string($conn, $postData['lastname']);
                $second_lastname = mysqli_real_escape_string($conn, $postData['second_lastname']);
                $date = (new DateTime($postData['date']))->format('Y-m-d');
                $address = mysqli_real_escape_string($conn, $postData['address']);
                $phone = mysqli_real_escape_string($conn, $postData['phone']);
                $email = mysqli_real_escape_string($conn, $postData['email']);
                $cell_phone = mysqli_real_escape_string($conn, $postData['cell_phone']);
                $gender = mysqli_real_escape_string($conn, $postData['gender']);
                $ci_expedition = mysqli_real_escape_string($conn, $postData['ci_expedition']);
                $stmt->bind_param(
                    "sissssssssss",
                    $num_ci,
                    $profession,
                    $name,
                    $lastname,
                    $second_lastname,
                    $date,
                    $address,
                    $phone,
                    $email,
                    $cell_phone,
                    $gender,
                    $ci_expedition
                );
                if ($result = $stmt->execute()) {
                    $response = array("message" => "Actualización exitosa");
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

    public function updatePersonView()
    {
        include('app/views/personnel/update.php');
    }

    function searchPerson($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT p.APPATERNO, p.APMATERNO, p.NOMBRES, p.CI, p.FECHANACIMIENTO, p.CODPROFESION,
                pf.PROFESION, p.DIRECCION, p.TELEFONO, p.CELULAR, p.CORREO, p.SEXO, p.EXPEDIDOCI 
                FROM persona p
                INNER JOIN profesion pf ON p.CODPROFESION = pf.CODPROFESION
                WHERE p.CI = '" . $postData['ci'] . "'";
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


    function searchPersonnel($postData)
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
                    $query = "CALL DB_SP_Persona_search(?)";
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
        }
    }

    function get_all_professions($postData)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        try {
            if ($conn = get_connection()) {
                $query = "SELECT * FROM DB_VIEW_Profesion_view";
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