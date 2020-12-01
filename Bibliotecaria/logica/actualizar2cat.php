<?php

include("db.php"); 
          

        $codcat = $_POST['codcat'];
        $nomcat = $_POST['nomcat'];


        $actualizar= "UPDATE categorias SET COD_CATEGORIA='$codcat', NOMB_CATEG='$nomcat' WHERE COD_CATEGORIA='$codcat' ";





$resultado= mysqli_query($conexion, $actualizar);
mysqli_close($conexion);
if($resultado){
echo "<script languaje='javascript'>alert('Se actualizo correctamente'); window.location.href = '../listcategory.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('No se pudo actualizar'); location.href = '../listcategory.php';</script>";


} 