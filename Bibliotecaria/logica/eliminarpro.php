<?php
include("db.php");

$id= $_GET['id'];
$eliminar= "DELETE FROM proveedores WHERE COD_PROVEEDOR='$id'";

$resultadoEliminar= mysqli_query($conexion, $eliminar);
mysqli_close($conexion);
if($resultadoEliminar){
	
	header("Location: ../listprovider.php");
}