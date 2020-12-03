<?php
include("db.php");

$id= $_GET['id'];
$eliminar= "DELETE FROM herramienta WHERE COD_LH='$id'";

$resultadoEliminar= mysqli_query($conexion, $eliminar);
mysqli_close($conexion);
if($resultadoEliminar){
	
	header("Location: ../catalog.php");
}