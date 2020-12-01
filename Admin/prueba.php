                                <!DOCTYPE html>
                                <html>
                                <head>
                                    <title></title>
                                </head>
                                <body>



                                <select class="form-control" name="curso"  data-toggle="tooltip" data-placement="top" title="Elige la sección a la que pertenece el alumno">
                                    <option value="" disabled="" selected="">Selecciona un Curso</option>
                                <?php
                                    include ("conexion.php");

                                    $consulta = "SELECT * FROM curso where curso != 'admin' ";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($row = mysqli_fetch_array($resultado))
                                    {
                                        
                                      $codigo = $row["COD_CURSO"];
                                      $curso = $row["CURSO"];



                                    ?>

                                    <option value ="<?php echo $codigo;?>"><?php echo $curso;?> </option>
                                     



                                    <?php } ?>
                                </select>                                
                                </body>
                                </html>

