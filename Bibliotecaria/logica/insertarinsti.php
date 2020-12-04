<?php

include("db.php");

        $nit = $_POST['nit'];
        $nombin = $_POST['nombin'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $pais = $_POST['pais'];
        $ciudad = $_POST['ciudad'];
        $pagina = $_POST['pagina'];



$insertar = "INSERT INTO configuracion (nit_empresa, nombre_empresa, direccion, telefono, correo, pais, ciudad, paginaweb) VALUES ('$nit','$nombin','$direccion','$telefono','$correo','$pais','$ciudad','$pagina')";
$resultado= mysqli_query($conexion,$insertar);
mysqli_close($conexion);
if(!$resultado){

echo "<script languaje='javascript'>alert('No se pudo registrar con extito'); window.location.href = '../institution.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href = '../institution.php';</script>";


} 
