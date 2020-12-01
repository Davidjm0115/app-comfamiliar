<?php

include 'conexion.php';

$query = "SELECT * FROM personal ORDER BY PRIMER_NOMBRE";

if (isset($_POST['consulta'])){

$q = $mysqli->real_escape_string($_POST['consulta']);
$query = "SELECT * FROM personal WHERE PRIMER_NOMBRE LIKE '%".$q."%' OR PRIMER_APE LIKE '%".$q."%' OR ID LIKE '%".$q."%'";
}

$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {

	$salida.=" <table width='100%' border='2' >
              <thead>
              <tr>
                  <td><b><center>Identificación</center></b></td>
                  <td><b><center>Nombre</center></b></td>
                  <td><b><center>Primer Apellido</center></b></td>
                  <td><b><center>Segundo Apellido</center></b></td>
                  <td><b><center>Categoria</center></b></td>
                  <td><b><center>Curso</center></b></td>
                  <td><b><center>Correo</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                  <td><b><center>Editar</center></b></td>
                  <td><b><center>Eliminar</center></b></td>
            </tr></thead> <tbody>
";

while ($fila = $resultado->fetch_assoc()) {
	
	$salida.="
                <tr>
                  <td><b><center>".$fila['ID']."</center></b></td>
                  <td><b><center>".$fila['PRIMER_NOMBRE']."</center></b></td>
                  <td><b><center>".$fila['PRIMER_APE']."</center></b></td>
                  <td><b><center>".$fila['SEGUNDO_APE']."</center></b></td>
                  <td><b><center>".$fila['CATEGORIA']."</center></b></td>
                  <td><b><center>".$fila['CURSO']."</center></b></td>
                  <td><b><center>".$fila['CORREO']."</center></b></td>
                  <td><b><center>".$fila['TELEFONO']."</center></b></td>
                  
                  <td><center><a href='actualizaar.php?id=".$consulta['ID']."'><button class='btn btn-primary'><i class='zmdi zmdi-refresh'> Editar</button></center></td>
                  
                  <td><center><a href='eliminar.php?id=".$consulta['ID']."' class='eliminar'><button class='btn btn-danger'>Eliminar  <i class='zmdi zmdi-delete'></i></button><a></center></td>
                </tr>"


}

$salida.="</tbody></table>";
	
} else{

$salida.="no hay datos :(";

}


echo $salida;

$mysqli->close();

         