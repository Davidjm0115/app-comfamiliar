<?php

include("db.php");

        $codlib = $_POST['codlib'];
        $nomblib = $_POST['nomblib'];
        $autor = $_POST['autor'];
        $cantidad = $_POST['cantidad'];
        $categoria = $_POST['categoria'];
        $proveedor = $_POST['proveedor'];
        $estado = $_POST['estado'];
        $editlibro = $_POST['editlibro'];


$insertar = "INSERT INTO herramienta (COD_LH, NOMBRE_LH, CATEGORIA, EDITORIAL, ESTADO_LH, CANTIDAD, CANTIDAD_DISPONIBLE, COD_PROVEEDOR,AUTOR ) VALUES ('$codlib','$nomblib','$categoria','$editlibro','$estado','$cantidad', '$cantidad','$proveedor','$autor')";
$resultado= mysqli_query($conexion,$insertar);
mysqli_close($conexion);
if(!$resultado){

echo "<script languaje='javascript'>alert('No se pudo registrar con extito'); window.location.href = '../book.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href = '../book.php';</script>";


} 
