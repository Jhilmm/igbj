<?php
class LoginController
{
    public function showLoginForm()
    {
        include('app/views/auth/login.php');
    }
    public function datos()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); // Método no permitido
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }

        $data = [
            'username' => 'JohnDoe',
            'email' => 'johndoe@example.com',
            'roles' => ['admin', 'user'],
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
