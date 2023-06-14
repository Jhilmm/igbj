<?php 
require_once DOCUMENT_ROOT . 'public/vendor/PDF/fpdf.php';
class PDF extends FPDF
{
    function Header()
    {
        //logo
        $this->Ln(10);
        //$this->Image('igbj/public/img/logo.png',20,15,30);
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,10,'ORDEN DE TRABAJO',0,1,'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        $this->Cell(210,10,'Instituto de gastroenterologia boliviano japones - Cochabamba',0,1,'C');
    }
}
