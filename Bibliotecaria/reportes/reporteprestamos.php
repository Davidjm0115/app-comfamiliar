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
    $this->Cell(30,10, utf8_decode('En este reporte podrá ver todos los prestamos que se han registrado en el software y si estos fueron devueltos o aún siguen activos.'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetX(20);
 	$this->Cell(50,10, 'Estudiante', 1,0,'C',0);   
 	$this->Cell(32,10, 'Herramienta', 1,0,'C',0);   
 	$this->Cell(30,10, 'Fecha salida', 1,0,'C',0);   
 	$this->Cell(30,10, 'Hora salida', 1,0,'C',0);   
 	$this->Cell(30,10, 'Fecha entrega', 1,0,'C',0);   
 	$this->Cell(30,10, 'Hora entrega', 1,0,'C',0);   	
 	$this->Cell(30,10, 'Cantidad', 1,0,'C',0); 
    $this->Cell(30,10, 'Estado', 1,1,'C',0);   
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
$consulta = "SELECT PRESTAMO_ID, CONCAT (prestamos.USUARIO_ID,' - ',personal.PRIMER_NOMBRE,' ',personal.PRIMER_APE)nombre2,herramienta.NOMBRE_LH nombre,FECHA_SALIDA,HORA_SALIDA,FECHA_ENTREGA,HORA_ENTREGA,CANTIDA_SA,ESTADO from prestamos,herramienta,personal WHERE herramienta.COD_LH = prestamos.COD_LH AND personal.ID = prestamos.USUARIO_ID";

$resultado= mysqli_query($conexion, $consulta);
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);


while ($row = $resultado->fetch_assoc()) {
$pdf->SetX(20);	
$pdf->Cell(50,15, utf8_decode($row['nombre2']), 1,0,'C',0);   
$pdf->Cell(32,15, utf8_decode($row['nombre']), 1,0,'C',0);
$pdf->Cell(30,15, $row['FECHA_SALIDA'],  1,0,'C',0);
$pdf->Cell(30,15, $row['HORA_SALIDA'], 1,0,'C',0);;
$pdf->Cell(30,15, $row['FECHA_ENTREGA'], 1,0,'C',0);
$pdf->Cell(30,15, $row['HORA_ENTREGA'], 1,0,'C',0);
$pdf->Cell(30,15, $row['CANTIDA_SA'], 1,0,'C',0);
$pdf->Cell(30,15, $row['ESTADO'], 1,1,'C',0);

}

$pdf->Output();


           
           