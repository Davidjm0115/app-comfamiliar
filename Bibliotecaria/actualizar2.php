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


        $actualizar= "UPDATE personal SET PRIMER_NOMBRE='$pnombre', SEGUNDO_NOMBRE='$snombre', PRIMER_APE='$papellido', SEGUNDO_APE='$sapellido', CATEGORIA='$categoria', CURSO='$curso', CORREO=' $correo', TELEFONO='$tel' WHERE ID='$numid' ";





$resultado= mysqli_query($conexion, $actualizar);
mysqli_close($conexion);
if($resultado){
echo "<script languaje='javascript'>alert('Se actualizo correctamente'); window.location.href = 'liststudent.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('No se pudo actualizar'); location.href = 'liststudent.php';</script>";


} 
