<?php include './include/session.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Semanas Académicas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="lib/SRCB/css/material-design-iconic-font.min.css">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="lib/SRCB/css/normalize.css">
        <link rel="stylesheet" href="lib/SRCB/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/SRCB/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="lib/SRCB/css/timeline.css">
        <link rel="stylesheet" href="lib/SRCB/css/style.css">
        <script src="lib/SRCB/js/jquery-1.11.2.min.js"></script>
        <script src="lib/SRCB/js/modernizr.js"></script>
        <script src="lib/SRCB/js/bootstrap.min.js"></script>
        <script src="lib/SRCB/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="lib/SRCB/js/main.js"></script>
        <!--JQueryConfirm-->
        <link rel="stylesheet" type="text/css" href="lib/jqueryconfirm/css/jquery-confirm.css">
        <script src="lib/jqueryconfirm/js/jquery-confirm.js"></script>
        <!--DataTables-->
        <script src="lib/DataTables/js/jquery.dataTables.min.js"></script>
        <script src="lib/DataTables/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="lib/DataTables/css/dataTables.bootstrap.min.css">
        <!--link rel="stylesheet" type="text/css" href="css/cargando.css"-->
    </head>
    <body>
        <!--div id="cargandopagina"></div>
        <div id="cargandofuncion" hidden></div-->
        <?php include './include/nabvarlateral.php'; ?>

        <div class="content-page-container full-reset custom-scroll-containers">
            <?php include './include/nav.php'; ?>

            <div class="container">
                <div class="page-header">
                    <h1 class="all-tittles">Semanas Academicas</h1>
                </div>
            </div>
            <div class="container-fluid">
                <a class="btn btn-default" href="semanasacademicas_add_edit.php?id=0">Nuevo</a>
                <br><br>
                <div class="table-responsive">
                    <table id="tblData"  class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No. Control</th>
                                <th>Nombre Del Alumno</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>Fecha de regreso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM alumno INNER JOIN semana_academica ON alumno.id_alumno = semana_academica.id_alumno NATURAL JOIN carrera;";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                foreach ($result as $data) {
                                    $data['acciones'] = '<a class="btn btn-info" href="semanasacademicas_add_edit.php?id='.$data['id_semana_academica'].'">Actualizar</a> <a class="btn btn-danger" target="_blank" href="permiso.php?id='.$data['id_semana_academica'].'">PDF</a>';
                                    $numero_control = $data['numero_control'];
                                    $nombre_completo = $data['nombre_completo'];
                                    $semestre = $data['semestre'];
                                    $carrera = $data['carrera'];
                                    $fecha_regreso = $data ['fecha_regreso'];
                                    $acciones = $data['acciones'];
                                    echo "<tr>
                                <td>$numero_control</td>
                                <td>$nombre_completo</td>
                                <td>$semestre</td>
                                <td>$carrera</td>
                                <td>$fecha_regreso</td>
                                <td>$acciones</td>
                                </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <script src="js/semanasacademicas.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>