<?php

$usuario = $_SESSION['usuario'];
$rool = $_SESSION['rol'];

if (!isset($usuario)) {
    
    header("location:../index.php");
}else{
    if ($rool != 2) {
        header("location:.././admin/home.php");
    }
}

?>