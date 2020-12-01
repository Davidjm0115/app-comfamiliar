<?php
include("db.php");

$id= $_GET['id'];
$eliminar= "DELETE FROM categorias WHERE COD_CATEGORIA='$id'";

$resultadoEliminar= mysqli_query($conexion, $eliminar);
mysqli_close($conexion);
if($resultadoEliminar){
	
	header("Location: ../listcategory.php");
}