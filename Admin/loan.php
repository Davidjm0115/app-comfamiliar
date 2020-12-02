<?php
session_start();
include ('./logica/validacion.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Prestamos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile nav-lateral-scroll">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                COLEGIO COMFAMILIAR
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <figure>
                    <img src="assets/img/comfa.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">BIBLIOTECA COMFAMILIAR</p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="home.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="institution.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Datos institución</a></li>
                            <li><a href="provider.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo proveedor</a></li>
                            <li><a href="category.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="admin.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo administrador</a></li>    
                            <li><a href="student.php"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Personal</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="catalog.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos y reservaciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="loan.php"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los préstamos</a></li>
                            <li>
                                <a href="loanpending.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones pendientes <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="report.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li>
                    <li><a href="advancesettings.php"><i class="zmdi zmdi-help-outline zmdi-hc-fw"></i></i>&nbsp;&nbsp; Acerca De...</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles"><?php $usuario = $_SESSION['usuario']; $nombre=$usuario['NOMBRE_USU']; echo $nombre;?></span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="index.html" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
                <li class="desktop-menu-button hidden-xs" style="float: left !important;">
                    <i class="zmdi zmdi-swap"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="jumbotron">
            <div class="page-header">
              <center><h1 class="all-tittles">Pestamos de libros y herramientas</small></h1></center>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li class="active"><a href="loan.php">Todos los préstamos</a></li>
                <li><a href="loanpending.php">Devoluciones pendientes</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/calendar_book.png" alt="calendar" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a esta sección, aquí se muestran todos los préstamos de libros realizados hasta la fecha y que ya se entregaron satisfactoriamente
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                          <li class="active">Prestamos</li>
                        <li><a href="prestamos.php">Crear nuevo prestamo</a></li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="text-center all-tittles">Listado de préstamos</h2>
            <div class="table-responsive">
                 <?php
     
      include("conexion.php");

            $contador = 0 ;
          $resultados = mysqli_query($conexion,"SELECT * from prestamos");?>

          <table width='100%' border="2" id="estudiantes_tabla" >
              <thead style="color: #fff;background-color: #188010;">
              <tr>
                  <td><b><center>#</center></b></td>
                  <td><b><center>Estudiante</center></b></td>
                  <td><b><center>Herramienta</center></b></td>
                  <td><b><center>Fecha salida</center></b></td>
                  <td><b><center>Hora salida</center></b></td>
                  <td><b><center>Fecha entrega</center></b></td>
                  <td><b><center>Hora entrega</center></b></td>
                  <td><b><center>Cantidad prestada</center></b></td>
                  <td><b><center>Estado</center></b></td>
                  <td><b><center>Prestamo</center></b></td>




            </tr></thead> <tbody>

          <?php while($consulta = mysqli_fetch_array($resultados))
          {
                $contador++;
        echo"
                <tr style='color: #000;'>
                <td><b><center>".$contador."</center></b></td>
                  <td><b><center>".$consulta['USUARIO_ID']."</center></b></td>
                  <td><b><center>".$consulta['COD_LH']."</center></b></td>
                  <td><b><center>".$consulta['FECHA_SALIDA']."</center></b></td>
                  <td><b><center>".$consulta['HORA_SALIDA']."</center></b></td>
                  <td><b><center>".$consulta['FECHA_ENTREGA']."</center></b></td>
                  <td><b><center>".$consulta['HORA_ENTREGA']."</center></b></td>
                  <td><b><center>".$consulta['CANTIDA_SA']."</center></b></td>
                  <td><b><center>".$consulta['ESTADO']."</center></b></td>";

                  switch ($consulta['ESTADO']) {
                             case 'Prestado':
                                echo "<td><center><a href='./logica/devolucion.php?id=".$consulta['PRESTAMO_ID']."' class='eliminar'><button class='btn btn-danger'> <i class='zmdi zmdi-close'></i></button><a></center></td>";
                                break;
                             case 'Devuelto':
                                echo "<td><center></center></td>";
                                break;

}


           
          }?>
  
        </tbody></table>

                
<br><br>
</div></div></div>
        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p>
                            Software de gestion de inventario y prestamos hecho a la medida por la empresa Nova System S.A.S para la institucion educativa comfamiliar, el programa se encuentra en Fase beta hasta el 4 de diciembre donde se presenatara la version 1.0 del software.
                        </p>
                    </div>
                         <div class="col-xs-12 col-sm-6">
        
                        <center> <h4 class="all-tittles">Desarrollador</h4><img src="assets/img/logo_png.png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;  ">
                    </div></center>
            </div>
            <div class="footer-copyright full-reset all-tittles">©NOVA SYSTEM 2020</div>
        </footer>   
    </div>

    <script type="text/javascript" src="./js/confirmacion.js"></script>
<script type="text/javascript" src="./js/init_datatable.js"></script>
</body>
</html>