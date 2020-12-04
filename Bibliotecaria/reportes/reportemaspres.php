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
    
    $this->Cell(30,10,'REPORTE COMFAMILIAR',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->SetX(90);
    $this->Cell(30,10, utf8_decode('En este reporte veremos los 30 libros que más se han prestado en la biblioteca.'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetX(40);
    $this->Cell(10,10, '#', 1,0,'C',0);   
    $this->Cell(60,10, 'Nombre de la herramienta', 1,0,'C',0);   
    $this->Cell(60,10, 'Cantidad total de prestamos', 1,1,'C',0);   


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
$consulta = "SELECT herramienta.NOMBRE_LH Nombre_Herramienta, SUM(prestamos.CANTIDA_SA) AS TOTAL_PRESTADO from prestamos,herramienta WHERE herramienta.COD_LH = prestamos.COD_LH GROUP BY prestamos.COD_LH ORDER BY SUM(prestamos.CANTIDA_SA) DESC LIMIT 0 , 30";
 $contador = 1 ;
$resultado= mysqli_query($conexion, $consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while ($row = $resultado->fetch_assoc()) {
$pdf->SetX(40);	
$pdf->Cell(10,10, $contador++, 1,0,'C',0);
$pdf->Cell(60,10,  $row['Nombre_Herramienta'], 1,0,'C',0);
$pdf->Cell(60,10, utf8_decode($row['TOTAL_PRESTADO']), 1,1,'C',0);



}

$pdf->Output();
