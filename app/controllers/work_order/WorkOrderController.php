<?php
require_once DOCUMENT_ROOT . 'app/controllers/PDF.php';
class WorkOrderController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orden = $_POST['name_depa'];
            $ordenes = $this->search($orden);
            include('app/views/work_order/work_order_view.php');
            exit();
        } else {
            $ordenes = $this->view();
            include('app/views/work_order/work_order_view.php');
        }
    }

    public function registerWorkOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fecha = $_POST['fec_orden'];
            $responsable = $_POST['resp_activo'];
            $activo = $_POST['cod_activo'];
            $sintomas = $_POST['des_sintomas'];
            $ordenes = $this->register($fecha,$activo,$sintomas);
            header("Location: /igbj/orden_trabajo");
        } else {
            include('app/views/work_order/work_order_register.php');
        }
    }

    public function reportWorkOrder()
    {
        $cod = $_GET["orden"];
        $ordenes = $this->print($cod);
        foreach ($ordenes as $orden) :
            $pdf = new PDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', '', 12);

            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, 'Fecha de orden: ', 0, 0, 'L');
            $pdf->Cell(70, 9, $orden['FECHAORDEN'], 0, 0, 'L');
            $pdf->Ln(10);

            $departameto = ucwords(strtolower($orden['NOMBDEPARTAMENTO']));
            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, 'Departamento: ', 0, 0, 'L');
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', $departameto), 0, 0, 'L');
            $pdf->Ln(10);

            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, 'C.I. del responsable: ', 0, 0, 'L');
            $pdf->Cell(70, 9, $orden['CI'], 0, 0, 'L');
            $pdf->Ln(10);

            $responsable = ucwords(strtolower($orden['NOMBRES'] . " " . $orden['APPATERNO'] . " " . $orden['APMATERNO']));
            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, 'Nombre del responsable: ', 0, 0, 'L');
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', $responsable), 0, 0, 'L');
            $pdf->Ln(10);

            $cargo = ucwords(strtolower($orden['CARGO']));
            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, 'Cargo del responsable: ', 0, 0, 'L');
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', $cargo), 0, 0, 'L');
            $pdf->Ln(10);

            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', 'Código del activo: '), 0, 0, 'L');
            $pdf->Cell(70, 9, $orden['CODACTIVO'], 0, 0, 'L');
            $pdf->Ln(10);

            $descripcion_activo = ucwords(strtolower($orden['DESCRIPCION']));
            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', 'Descripción del activo: '), 0, 0, 'L');
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', $descripcion_activo), 0, 0, 'L');
            $pdf->Ln(10);

            $descripcion_sintomas = ucwords(strtolower($orden['DESCRIPSINTOMAS']));
            $pdf->Cell(20, 10, '', 0, 0);
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', 'Descripción de síntomas: '), 0, 0, 'L');
            $pdf->Cell(70, 9, iconv('UTF-8', 'ISO-8859-1', $descripcion_sintomas), 0, 0, 'L');
            $pdf->Ln(10);

            $pdf->Output();
        endforeach;
    }

    //Funcion para obtener todos los registros de las ordenes de trabajo para mostrar
    public function view()
    {
        $conn = get_connection();
        $query = 'SELECT CODORDENTRABAJO, FECHAORDEN, CODDEPARTAMENTO, NOMBDEPARTAMENTO, CI, NOMBRES,
        APPATERNO, APMATERNO, CARGO, CODACTIVO, DESCRIPCION, DESCRIPSINTOMAS FROM DB_VIEW_Ordentrabajo_view';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }
    //Funcion para registrar una nueva orden de trabajo
    public function register($fecha, $cod_act, $des)
    {
        $conn = get_connection();
        $cod_asig = $this->get_cod_asig($cod_act);
        $estado = 0;
        $stmt = $conn->prepare("CALL DB_SP_Ordentrabajo_add(?,?,?,?)");
        $stmt->bind_param("issi", $cod_asig, $fecha, $des, $estado);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    //Funcion para obtener el registro buscado
    public function search($name_depa)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Ordentrabajo_searchbydepartamento("' . $name_depa . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para obtner el registro mediante un id para imprimir en PDF
    public function print($cod)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Ordentrabajo_print("' . $cod . '")';
        if ($result = $conn->query($query)) {
            return $result;
        } else {
            return null;
        }
    }

    //Funcion para obtener el codido del activo
    public function get_cod_asig($cod)
    {
        $conn = get_connection();
        $query = 'CALL DB_SP_Activo_verifyCodasigactivo("' . $cod . '")';
        $result = $conn->query($query);
        $row = $result->fetch_array(MYSQLI_BOTH);
        $cod_asig = $row['CODASIGACTIVO'];
        return $cod_asig;
    }
}
