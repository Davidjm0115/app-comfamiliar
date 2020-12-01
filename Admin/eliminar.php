<?php
include("conexion.php");

$id= $_GET['id'];
$eliminar= "DELETE FROM personal WHERE ID='$id'";

$resultadoEliminar= mysqli_query($conexion, $eliminar);

if($resultadoEliminar){
	
	header("Location: liststudent.php");
}