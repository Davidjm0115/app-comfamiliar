<?php

include("db.php");

        $id = $_GET['id'];


		$estado= "UPDATE categorias SET ESTADO='Activa' WHERE COD_CATEGORIA='$id' ";
		$estado= mysqli_query($conexion,$estado);



		mysqli_close($conexion);

	if($estado){

	header("Location: ../listcategory.php");
}