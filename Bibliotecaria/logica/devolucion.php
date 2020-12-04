<?php

include("db.php");

        $id = $_GET['id'];


		$insertar = "SELECT * FROM prestamos WHERE 	PRESTAMO_ID = '$id' ";
		$resultado= mysqli_query($conexion,$insertar);
		$array = mysqli_fetch_array($resultado);
		$cantsalida=($array['CANTIDA_SA']);
		$codherra=($array['COD_LH']);

		$consulta = "SELECT CANTIDAD_DISPONIBLE From herramienta WHERE COD_LH='$codherra'";
		$canres= mysqli_query($conexion,$consulta);
		$array2 = mysqli_fetch_array($canres);
		
		$suma=($array2['CANTIDAD_DISPONIBLE']+$cantsalida);

		$estado= "UPDATE prestamos SET ESTADO='Devuelto' WHERE PRESTAMO_ID='$id' ";
		$suma= "UPDATE herramienta SET CANTIDAD_DISPONIBLE='$suma' WHERE COD_LH='$codherra' ";
		$estado= mysqli_query($conexion,$estado);
		$devol= mysqli_query($conexion,$suma);


		mysqli_close($conexion);

	if($estado){

	header("Location: ../loan.php");
}
