<?php
include("db.php");

$id= $_GET['id'];
$eliminar= "DELETE FROM usuario WHERE USUARIO_ID='$id'";

$resultadoEliminar= mysqli_query($conexion, $eliminar);
mysqli_close($conexion);
if($resultadoEliminar){
	
	header("Location: ../listadmin.php");
}