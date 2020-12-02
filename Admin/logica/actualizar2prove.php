<?php

include("db.php"); 
          
        $nompro = $_POST['nompro'];
        $direc = $_POST['direc'];
        $telpro = $_POST['telpro'];
        $producto = $_POST['producto'];
        $pais = $_POST['pais'];
        $ciudad = $_POST['ciudad'];
        $provid = $_POST['provid'];




        $actualizar= "UPDATE proveedores SET NOMBRE_PROVEEDOR='$nompro', PRODUCTO='$producto', DIREC_PRO='$direc', TELEFONO_PROVEEDOR='$telpro', PAIS='$pais', CIUDAD='$ciudad' WHERE COD_PROVEEDOR='$provid' ";





$resultado= mysqli_query($conexion, $actualizar);
mysqli_close($conexion);
if($resultado){
echo "<script languaje='javascript'>alert('Se actualizo correctamente'); window.location.href = '../listprovider.php';</script>";
}
else {

echo "<script languaje='javascript'>alert('No se pudo actualizar'); location.href = '../listprovider.php';</script>";


} 
