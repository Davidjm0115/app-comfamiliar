<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/img/comfa.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'REPORTE COMFAMILIAR',0,0,'C');
    // Salto de línea
    $this->Ln(20);

 	$this->Cell(20,10, 'ID', 1,0,'C',0);   
 	$this->Cell(25,10, 'Nombre', 1,0,'C',0);   
 	$this->Cell(30,10, 'Apellido', 1,0,'C',0);   
 	$this->Cell(30,10, 'Apellido', 1,0,'C',0);   
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

require ('conexion.php');
$consulta = "SELECT * FROM personal WHERE CURSO !=1 order by PRIMER_NOMBRE";

$resultado= mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while ($row = $resultado->fetch_assoc()) {
	
$pdf->Cell(20,10, $row['ID'], 1,0,'C',0);
$pdf->Cell(25,10, $row['PRIMER_NOMBRE'], 1,0,'C',0);
$pdf->Cell(30,10, $row['PRIMER_APE'], 1,0,'C',0);
$pdf->Cell(30,10, $row['SEGUNDO_APE'], 1,0,'C',0);
$pdf->Cell(30,10, $row['CATEGORIA'], 1,0,'C',0);
$pdf->Cell(30,10, $row['CURSO'], 1,0,'C',0);
$pdf->Cell(30,10, $row['TELEFONO'], 1,1,'C',0);


}

$pdf->Output();
?>