<?php

$host ="localhost";
$usuario = "root";
$clave = "";
$bd = "comfamiliar";

$conexion = mysqli_connect($host,$usuario,$clave,$bd);
$conexion->set_charset("utf8mb4");
?>