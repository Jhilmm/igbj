<?php
class AuthController
{
    public function authenticate($postData)
    {
        try {
            if ($conn = get_connection()) {
                $username = $postData["username"];
                $password = $postData["password"];
                $query = "SELECT * FROM usuario WHERE username = ? and password = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();

                $result = $stmt->get_result();
                if ($result->fetch_assoc()) {
                    error_log($password);
                    $token = $this->generateToken();
                    $this->saveTokenToDatabase($conn, $username, $token);
                    error_log($token);
                    error_log($username);
                    echo json_encode(['token' => $token]);
                    return;

                } else {
                    http_response_code(401);
                    echo json_encode(['error' => 'Credenciales inválidas']);
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

    private function generateToken()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Versión 4
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Variant RFC 4122

        $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        return $uuid;
    }

    private function saveTokenToDatabase($conn, $username, $token)
    {
        try {
            $query = "UPDATE usuario SET token = ? WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $token, $username);
            $stmt->execute();
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error con la base de datos: ' . $e->getMessage()]);
            exit;
        }
    }
}