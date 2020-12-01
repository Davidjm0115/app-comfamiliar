<?php

include 'db.php';

if (!isset($_POST['buscar'])){
	
$_POST['buscar']="";

$buscar = $_POST['buscar'];

}


$buscar = $_POST['buscar'];


$consulta = ("SELECT * FROM personal WHERE PRIMER_NOMBRE like'$buscar%' or ID like'$buscar%' PRIMER_APE like '$buscar%'") ;


$resultado = mysqli_query($conexion,$consulta);

