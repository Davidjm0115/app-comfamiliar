<?php

include("db.php");

        $idusu = $_POST['idusu'];
        $codlh = $_POST['codlh'];
        $fechasa = $_POST['fechasa'];
        $horasa = $_POST['horasa'];
        $fechaen = $_POST['fechaen'];
        $horaen = $_POST['horaen'];
        $cantidad = $_POST['cantidad'];



		$insertar = "INSERT INTO prestamos (USUARIO_ID, COD_LH, FECHA_SALIDA, HORA_SALIDA, 	FECHA_ENTREGA, HORA_ENTREGA, CANTIDA_SA, ESTADO ) VALUES ('$idusu','$codlh','$fechasa','$horasa','$fechaen','$horaen', '$cantidad', 'Prestado')";

		$consulta = "SELECT CANTIDAD_DISPONIBLE From herramienta WHERE COD_LH='$codlh'";
		$resultado= mysqli_query($conexion,$consulta);
		$array = mysqli_fetch_array($resultado);
		if ($cantidad > $array['CANTIDAD_DISPONIBLE'] or $cantidad<1) {
			
			echo "<script languaje='javascript'>alert('La cantidad prestada excede la cantdidad disponible'); location.href = '../prestamos.php';</script>";
		} else{
		$resta=($array['CANTIDAD_DISPONIBLE']-$cantidad);
		$canres= "UPDATE herramienta SET CANTIDAD_DISPONIBLE='$resta' WHERE COD_LH='$codlh' ";

		$canres2= mysqli_query($conexion,$canres);
		$resultado2= mysqli_query($conexion,$insertar);
		
		if($resultado2){

		header("Location: ../loan.php");
		}


		}
		mysqli_close($conexion);

