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
    function searchPerson($postData)
    {
        $searchValue = $postData['searchValue'];
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['error' => 'Solicitud no válida']);
            return;
        }
        $data = [
            [
                'last_name1' => 'Martínez',
                'last_name2' => 'López',
                'first_name' => 'María',
                'id_number' => '9876543',
                'birthdate' => '1985-05-05',
                'profession' => 'Abogada',
                'address' => 'Avenida 456',
                'phone' => '555-5678',
                'mobile' => '555-9012',
                'email' => 'maria.martinez@example.com',
                'gender' => 'F'
            ],
            [
                'last_name1' => 'González',
                'last_name2' => 'Hernández',
                'first_name' => 'Pedro',
                'id_number' => '1234567',
                'birthdate' => '1990-10-10',
                'profession' => 'Ingeniero',
                'address' => 'Calle 123',
                'phone' => '555-1234',
                'mobile' => '555-5678',
                'email' => 'pedro.gonzalez@example.com',
                'gender' => 'M'
            ]
        ];

        if (!empty($searchValue)) {
            $data = [
                [
                    'last_name1' => $searchValue,
                    'last_name2' => 'López',
                    'first_name' => 'María',
                    'id_number' => '9876543',
                    'birthdate' => '1985-05-05',
                    'profession' => 'Abogada',
                    'address' => 'Avenida 456',
                    'phone' => '555-5678',
                    'mobile' => '555-9012',
                    'email' => 'maria.martinez@example.com',
                    'gender' => 'F'
                ]
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
