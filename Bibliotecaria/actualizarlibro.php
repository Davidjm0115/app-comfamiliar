<?php
session_start();
include ('./logica/validacion.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrar Libro</title>
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
                                <a href="loanpending.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones pendientes </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="report.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li>
                    <li><a href="advancesettings.php"><i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Acerca De...</a></li>
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
              <center><h1 class="all-tittles">Añadir libro o herramienta</h1></center>
           
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/flat-book.png" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para agregar nuevos libros a la biblioteca o herramientas, deberas de llenar todos los campos para poder registrar el libro
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form"> 
           <?php
     
      include("./logica/db.php");
            $id= $_GET['id'];
          $resultados = mysqli_query($conexion,"SELECT * FROM herramienta WHERE COD_LH='$id'");


           while($consulta = mysqli_fetch_array($resultados))
          {?>
                <div class="title-flat-form title-flat-blue">Nuevo libro</div>
                <form class="form-padding" action="./logica/insertaherra.php" method="POST">
                    <div class="row">
                        <div class="col-xs-12">
                            <legend style="color: #fff"><i class="zmdi zmdi-account-box"></i> &nbsp; Información básica</legend><br>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                               <center> <p  style="padding-top: 15px">Codigo libro</p></center>
                                <input type="text" class="form-control" name="codlib" value="<?php echo $consulta['COD_LH']?>" placeholder="Escribe aquí el código correlativo del libro" pattern="[0-9]{1,20}" required="" readonly="" data-toggle="tooltip" data-placement="top" title="Escribe el código correlativo del libro, solamente números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                               <center> <p  style="padding-top: 15px">Nombre del libro</p> </center>
                                <input type="text" class="form-control" name="nomblib" value="<?php echo $consulta['NOMBRE_LH']?>" placeholder="Escribe aquí el título o nombre del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                               <center>  <p  style="padding-top: 15px">Autor</p> </center>
                                <input type="text"class="form-control" name="autor" value="<?php echo $consulta['AUTOR']?>" placeholder="Escribe aquí el autor del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del autor del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="group-material">
                              <center>  <p  style="padding-top: 15px">Ejemplares</p></center>
                                <input type="text" class="form-control" name="cantidad" value="<?php echo $consulta['CANTIDAD']?>" placeholder="Escribe aquí los Ejemplares del libro" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el país del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6" style="margin-left: 25%">
                            <div class="group-material">
                               <center>  <p  style="padding-top: 15px">Editorial</p> </center>
                                <input type="text" class="form-control" name="editlibro" value="<?php echo $consulta['EDITORIAL']?>"  placeholder="Escribe aquí la editorial del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Editorial del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <legend style="color: #fff "><i class="zmdi zmdi-bookmark-outline"></i> &nbsp; Categoría</legend><br>
                        </div>
                        <div class="col-xs-12">
                            <div class="group-material">
                               <center> <p  style="padding-top: 15px">Categoría</p> </center>
                                <select class="form-control" name="categoria" value="<?php echo $consulta['CATEGORIA']?>"  data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro">
                                    <option value="" disabled="" selected="">Selecciona una categoría</option>
                                    <?php
                                    include ("./logica/db.php");

                                    $consulta = "SELECT * FROM categorias WHERE ESTADO = 'Activa'";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($row = mysqli_fetch_array($resultado))
                                    {
                                        
                                      $codigo = $row["COD_CATEGORIA"];
                                      $nombcat = $row["NOMB_CATEG"];



                                    ?>

                                    <option value ="<?php echo $codigo;?>"><?php echo $nombcat;?> </option>
                                     


                                    <?php } ?>


                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <legend style="color: #fff"><i class="zmdi zmdi-label"></i> &nbsp; Otros datos</legend><br>
                        </div>
                        <div class="col-xs-12">
                            <div class="group-material">
                                <center>  <p  style="padding-top: 15px">Proveedor</p> </center>
                                <select class="form-control" name="proveedor" data-toggle="tooltip" data-placement="top" title="Elige el proveedor del libro">
                                    <option value="" disabled="" selected="">Selecciona un proveedor</option>
                                    <?php
                                    include ("./logica/db.php");

                                    $consulta = "SELECT * FROM proveedores ";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($row = mysqli_fetch_array($resultado))
                                    {
                                        
                                      $codigo = $row["COD_PROVEEDOR"];
                                      $nompro = $row["NOMBRE_PROVEEDOR"];



                                    ?>

                                    <option value ="<?php echo $codigo;?>"><?php echo $nompro;?> </option>
                                     


                                    <?php } ?>

                                  </select>
                            </div>
                        </div>

                        
                      <div class="col-xs-12">
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </p>
                       </div>
                    </div>
               </form>
            </div>
        </div>
        <?php } ?>  
    
            </div></center>
           
       
        
        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p>
                            Software de gestion de inventario y prestamos hecho a la medida por la empresa Nova System S.A.S para la institucion educativa comfamiliar, el programa se encuentra en fase beta hasta el 4 de diciembre donde se presenatara la version 1.0 del software.
                        </p>
                    </div>
                         <div class="col-xs-12 col-sm-6">
        
                        <center> <h4 class="all-tittles">Desarrollador</h4><img src="assets/img/logo_png.png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;  ">
                    </div></center>
            </div>
            <div class="footer-copyright full-reset all-tittles">©NOVA SYSTEM 2020</div>
        </footer>
    </div>
</body>
</html>