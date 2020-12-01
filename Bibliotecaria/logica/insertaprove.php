<?php

include("db.php");

        $nompro = $_POST['nompro'];
        $nomedit = $_POST['nomedit'];
        $direc = $_POST['direc'];
        $telpro = $_POST['telpro'];
        $producto = $_POST['producto'];
        $pais = $_POST['pais'];
        $ciudad = $_POST['ciudad'];
        $provid = $_POST['provid'];


$insertar = "INSERT INTO proveedores (COD_PROVEEDOR, NOMBRE_PROVEEDOR, NOMBRE_EDITORIAL, PRODUCTO, DIREC_PRO, TELEFONO_PROVEEDOR, PAIS, 	CIUDAD) VALUES ('$provid','$nompro','$nomedit','$producto', '$direc', '$telpro','$pais','$ciudad')";
$resultado= mysqli_query($conexion,$insertar);
mysqli_close($conexion);
if(!$resultado){

echo "<script languaje='javascript'>alert('No se pudo registrar con extito'); window.location.href = '../provider.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href = '../provider.php';</script>";


} 

