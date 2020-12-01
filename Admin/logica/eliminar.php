<?php
include("db.php");

$id= $_GET['id'];
$eliminar= "DELETE FROM personal WHERE ID='$id'";

$resultadoEliminar= mysqli_query($conexion, $eliminar);
mysqli_close($conexion);
if($resultadoEliminar){
	
	header("Location: ../liststudent.php");
}