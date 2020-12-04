<?php

include("./logica/db.php"); 

        $numid = $_POST['numid'];
        $pnombre = $_POST['pnombre'];
        $snombre = $_POST['snombre'];
        $papellido = $_POST['papellido'];
        $sapellido = $_POST['sapellido'];
        $curso = $_POST['curso'];
        $categoria = $_POST['categoria'];
        $correo = $_POST['correo'];
        $tel = $_POST['tel'];

$insertar = "INSERT INTO personal(ID, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APE, SEGUNDO_APE, CATEGORIA, CURSO, CORREO, TELEFONO) VALUES ('$numid','$pnombre','$snombre','$papellido','$sapellido','$categoria','$curso','$correo','$tel')";
$resultado= mysqli_query($conexion,$insertar);

if(!$resultado){

echo "<script languaje='javascript'>alert('No se pudo registrar con extito'); window.location.href = 'student.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('Registro Exitoso'); location.href = 'student.php';</script>";


} 

