<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('.././assets/img/comfa.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'REPORTE COMFAMILIAR',0,0,'C');
    // Salto de línea
    $this->Ln(20);
        $this->SetX(91);
    $this->Cell(30,10, utf8_decode('En este reporte podrá ver todos aquel personal que se encuentra registrado en el software.'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
        $this->SetX(15);
 	$this->Cell(30,10, 'ID', 1,0,'C',0);   
 	$this->Cell(60,10, 'Nombre completo', 1,0,'C',0);    
 	$this->Cell(30,10, 'categoria', 1,0,'C',0);   
 	$this->Cell(30,10, 'Curso', 1,0,'C',0);   	
 	$this->Cell(30,10, 'Telefono', 1,1,'C',0);   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Page ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require ('.././logica/db.php');
$consulta = "SELECT ID,CATEGORIA,curso.CURSO cursoo,CORREO,TELEFONO, CONCAT(PRIMER_NOMBRE, ' ', PRIMER_APE,' ', SEGUNDO_APE) nombre_completo FROM personal,curso WHERE curso.COD_CURSO = personal.CURSO AND personal.CURSO <> 1";

$resultado= mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while ($row = $resultado->fetch_assoc()) {
$pdf->SetX(15);	
$pdf->Cell(30,10,  $row['ID'], 1,0,'C',0);
$pdf->Cell(60,10, utf8_decode($row['nombre_completo']), 1,0,'C',0);
$pdf->Cell(30,10, utf8_decode($row['CATEGORIA']), 1,0,'C',0);
$pdf->Cell(30,10,  $row['cursoo'], 1,0,'C',0);
$pdf->Cell(30,10,  $row['TELEFONO'], 1,1,'C',0);


}

$pdf->Output();
?>