<?php

$usuario = $_SESSION['usuario'];
$rool = $_SESSION['rol'];

if (!isset($usuario)) {
    
    header("location:../index.php");
}else{
    if ($rool != 1) {
        header("location:.././Bibliotecaria/home.php");
    }
}

?>