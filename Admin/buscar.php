<?php
  $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comfamiliar";

  $conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT ID,CATEGORIA,CURSO,CORREO,TELEFONO, CONCAT(PRIMER_NOMBRE, ' ', PRIMER_APE,' ', SEGUNDO_APE) nombre_completo FROM personal where CURSO <> 1";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT ID,CATEGORIA,CURSO,CORREO,TELEFONO, CONCAT(PRIMER_NOMBRE, ' ', PRIMER_APE) nombre_completo FROM personal WHERE  ID LIKE '%$q%'  OR CONCAT(PRIMER_NOMBRE, ' ', PRIMER_APE) LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
      $salida.="<table width='100%' border='2' >
              <thead>
              <tr>
                  <td><b><center>Identificación</center></b></td>
                  <td><b><center>Nombre completo</center></b></td>
                  <td><b><center>Categoria</center></b></td>
                  <td><b><center>Curso</center></b></td>
                  <td><b><center>Correo</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                  <td><b><center>Editar</center></b></td>
                  <td><b><center>Eliminar</center></b></td>
            </tr></thead> <tbody>";

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="  <tr>
                  <td><b><center>".$fila['ID']."</center></b></td>
                  <td><b><center>".$fila['nombre_completo']."</center></b></td>
                  <td><b><center>".$fila['CATEGORIA']."</center></b></td>
                  <td><b><center>".$fila['CURSO']."</center></b></td>
                  <td><b><center>".$fila['CORREO']."</center></b></td>
                  <td><b><center>".$fila['TELEFONO']."</center></b></td>
                  
                  <td><center><a href='actualizaar.php?id=".$fila['ID']."'><button class='btn btn-primary'><i class='zmdi zmdi-refresh'> Editar</button></center></td>
                  
                  <td><center><a href='./logica/eliminarpro.php?id=".$fila['ID']."' class='eliminar'><button class='btn btn-danger'>Eliminar  <i class='zmdi zmdi-delete'></i></button><a></center></td>
                </tr>";

      }
      $salida.="</tbody></table> 

        <center>        <nav aria-label='Page navigation example'>
  <ul class='pagination'>
    <li class='page-item'><a class='page-link' href='#'>Previous</a></li>
    <li class='page-item'><a class='page-link' href='#'>1</a></li>
    <li class='page-item'><a class='page-link' href='#'>2</a></li>
    <li class='page-item'><a class='page-link' href='#'>3</a></li>
    <li class='page-item'><a class='page-link' href='#'>Next</a></li>
  </ul>
</nav></center>

";?>
    


 <script type="text/javascript"> function confirmacion(e){

var respuesta = confirm("Elimina esa monda");

if (respuesta==true){

  return true;

}
else {

  return false;
}


}

</script>
    


 <?php }else{
      $salida.="<center>

       <h1>NO HAY DATOS :(</h1>
       <img src='assets/img/No_hay_datos.png' alt='Biblioteca' class='img-responsive center-box' style='width:55%;''><br><br>

      ";
    }


    echo $salida;

    $conn->close();



?>

