<?php
require './logica/db.php';



$usuario = $_POST ['usuario'];
$clave = $_POST ['clave'];


$q = "SELECT * from  usuario where USUARIO_ID = '$usuario' and PASS = '$clave'";




$consulta = mysqli_query($conexion,$q);


$array = mysqli_fetch_array($consulta);
mysqli_close($conexion);


	if(count($array)>0 and $array['NIVEL'] =='1')
{
		session_start();
		session_regenerate_id();
		$_SESSION['usuario'] = $array;
		$_SESSION['rol'] = $array['NIVEL'];

		header("location: ./Admin/home.php");
}

elseif (count($array)>0 and $array['NIVEL']=='2') 

{

		session_start();
		session_regenerate_id();
		$_SESSION['usuario'] = $array;
		$_SESSION['rol'] = $array['NIVEL'];
		header("location: ./Bibliotecaria/home.php");
	
}

else 
{	
				header("location: index.php?fallo=true");
			
}
