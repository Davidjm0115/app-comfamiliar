<?php

include("db.php");

        $usuid = $_POST['usuid'];
        $nomusu = $_POST['nomusu'];
        $pass = $_POST['pass'];
        $usunivel = $_POST['usunivel'];


$insertar = "INSERT INTO usuario (USUARIO_ID, PASS, NIVEL, NOMBRE_USU) VALUES ('$usuid','$pass','$usunivel','$nomusu')";
$resultado= mysqli_query($conexion,$insertar);
mysqli_close($conexion);
if(!$resultado){

echo "<script languaje='javascript'>alert('No se pudo registrar con extito'); window.location.href = '../admin.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href = '../admin.php';</script>";


} 

