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
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
     $this->SetX(139);
    $this->Cell(30,10,'REPORTE COMFAMILIAR',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->SetX(139);
    $this->Cell(30,10, utf8_decode('En este reporte podrá ver la información de todas aquellas herramientas que estan registradas en el software.'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetX(8);
    $this->Cell(35,10, 'Codigo herramienta', 1,0,'C',0);   
    $this->Cell(40,10, 'Nombre herramienta', 1,0,'C',0);   
    $this->Cell(30,10, 'Categoria', 1,0,'C',0);   
    $this->Cell(30,10, 'Cantidad', 1,0,'C',0);   
    $this->Cell(40,10, 'Cantidad Disponible', 1,0,'C',0);  
    $this->Cell(30,10, 'Proveedor', 1,0,'C',0);   
    $this->Cell(30,10, 'Editorial', 1,0,'C',0);      
    $this->Cell(50,10, 'Autor', 1,1,'C',0); 

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
$consulta = "SELECT * FROM herramienta";

$resultado= mysqli_query($conexion, $consulta);
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while ($row = $resultado->fetch_assoc()) {
$pdf->SetX(8);	
$pdf->Cell(35,10,  $row['COD_LH'], 1,0,'C',0);
$pdf->Cell(40,10, utf8_decode($row['NOMBRE_LH']), 1,0,'C',0);
$pdf->Cell(30,10, utf8_decode($row['CATEGORIA']), 1,0,'C',0);
$pdf->Cell(30,10,  $row['CANTIDAD'], 1,0,'C',0);
$pdf->Cell(40,10,  $row['CANTIDAD_DISPONIBLE'], 1,0,'C',0);
$pdf->Cell(30,10,  $row['COD_PROVEEDOR'], 1,0,'C',0);
$pdf->Cell(30,10,  $row['EDITORIAL'], 1,0,'C',0);
$pdf->Cell(50,10,  $row['AUTOR'], 1,1,'C',0);


}

$pdf->Output();

