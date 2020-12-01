<?php

include("db.php");

        $codcat = $_POST['codcat'];
        $nomcat = $_POST['nomcat'];



$insertar = "INSERT INTO categorias (COD_CATEGORIA, NOMB_CATEG) VALUES ('$codcat','$nomcat')";
$resultado= mysqli_query($conexion,$insertar);
mysqli_close($conexion);
if(!$resultado){

echo "<script languaje='javascript'>alert('No se pudo registrar con extito'); window.location.href = '../category.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href = '../category.php';</script>";


} 

