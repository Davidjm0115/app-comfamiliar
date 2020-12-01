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

    $query = "SELECT * FROM proveedores";

    if (isset($_POST['consulta'])) {
      $q = $conn->real_escape_string($_POST['consulta']);
      $query = "SELECT * FROM proveedores WHERE  COD_PROVEEDOR LIKE '%$q%'  OR NOMBRE_PROVEEDOR LIKE '%$q%' OR   PRODUCTO LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
      $salida.="          <table width='100%' border='2'>
              <thead>
              <tr>
                  <td><b><center>Codigo Proveedor</center></b></td>
                  <td><b><center>Nombre de Proveedor </center></b></td>
                  <td><b><center>Producto</center></b></td>
                  <td><b><center>Direccion Proveedor</center></b></td>
                  <td><b><center>Telefono proveedor</center></b></td>
                  <td><b><center>Pais</center></b></td>
                  <td><b><center>Ciudad</center></b></td>
                  <td><b><center>Editar</center></b></td>
                  <td><b><center>Eliminar</center></b></td>
            </tr></thead> <tbody>";

      while ($fila = $resultado->fetch_assoc()) {
        $salida.="  <tr>
                  <td><b><center>".$fila['COD_PROVEEDOR']."</center></b></td>
                  <td><b><center>".$fila['NOMBRE_PROVEEDOR']."</center></b></td>
                  <td><b><center>".$fila['PRODUCTO']."</center></b></td>
                  <td><b><center>".$fila['DIREC_PRO']."</center></b></td>
                  <td><b><center>".$fila['TELEFONO_PROVEEDOR']."</center></b></td>
                  <td><b><center>".$fila['PAIS']."</center></b></td>
                   <td><b><center>".$fila['CIUDAD']."</center></b></td>
                  
                  <td><center><a href='actualizaar.php?id=".$fila['COD_PROVEEDOR']."'><button class='btn btn-primary'><i class='zmdi zmdi-refresh'> Editar</button></center></td>
                  
                  <td><center><a href='eliminar.php?id=".$fila['COD_PROVEEDOR']."' class='eliminar'><button class='btn btn-danger' onclick='return confirmacion()'>Eliminar  <i class='zmdi zmdi-delete'></i></button><a></center></td>
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

