<?php

include("db.php"); 
          

        $usuid = $_POST['usuid'];
        $nomusu = $_POST['nomusu'];
        $pass = $_POST['pass'];
        $usunivel = $_POST['usunivel'];



        $actualizar= "UPDATE USUARIO SET NOMBRE_USU='$nomusu', PASS='$pass', NIVEL='$usunivel' WHERE USUARIO_ID='$usuid' ";





$resultado= mysqli_query($conexion, $actualizar);
mysqli_close($conexion);
if($resultado){
echo "<script languaje='javascript'>alert('Se actualizo correctamente'); window.location.href = '../listadmin.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('No se pudo actualizar'); location.href = '../listadmin.php';</script>";


} 
