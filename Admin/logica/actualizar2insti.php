<?php

include("db.php"); 
          

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $tel = $_POST['tel'];
        $correo = $_POST['correo'];
        $pais = $_POST['pais'];
        $ciudad = $_POST['ciudad'];
        $pagina = $_POST['pagina'];
 



        $actualizar= "UPDATE configuracion SET nombre_empresa='$nombre', direccion='$direccion',  telefono='$tel', correo ='$correo',pais='$pais',ciudad='$ciudad',paginaweb='$pagina' ";





$resultado= mysqli_query($conexion, $actualizar);
mysqli_close($conexion);
if($resultado){
echo "<script languaje='javascript'>alert('Se actualizo correctamente'); window.location.href = '../institution.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('No se pudo actualizar'); location.href = '../institution.php';</script>";


} 
	 		 	 