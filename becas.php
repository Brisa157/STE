<?php include './include/session.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Becas</title>
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
                    <h1 class="all-tittles">Becas</h1>
                </div>
            </div>
            <div class="container-fluid">
                <a class="btn btn-default" href="becas_add_edit.php?id=0">Nuevo</a>
                <br><br>
                <div class="table-responsive">
                    <table id="tblData"  class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No. Control</th>
                                <th>Nombre Del Alumno</th>
                                <th>Semestre</th>
                                <th>Tipo De Beca</th>
                                <th>Periodo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT id_asigna_beca, numero_control, nombre_completo, asigna_beca.semestre, beca 
                                      FROM asigna_beca INNER JOIN alumno ON asigna_beca.id_alumno = alumno.id_alumno 
                                      INNER JOIN beca ON asigna_beca.id_beca = beca.id_beca";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                foreach ($result as $data) {
                                    $data['acciones'] = '<a class="btn btn-info" href="becas_add_edit.php?id='.$data['id_asigna_beca'].'">Actualizar</a>';
                                    $numero_control = $data['numero_control'];
                                    $nombre_completo = $data['nombre_completo'];
                                    $semestre = $data['semestre'];
                                    $beca = $data['beca'];
                                    $acciones = $data['acciones'];
                                    echo "<tr>
                              <td>$numero_control</td>
                              <td>$nombre_completo</td>
                              <td>$semestre</td>
                              <td>Beca De $beca</td>
                              <td>$acciones</td>
                              </tr>";
                                }
                            }
                            ?>
                            <?php
                            /*
                            $idGrupo = $_REQUEST['id'];
                            $query = "SELECT * FROM persona INNER JOIN alumno ON persona.idPersona = alumno.idAlumno WHERE idGrupo = $idGrupo";
                            $result = mysqli_query($link, $query);
                            if ($result) {
                                foreach ($result as $data) {
                                    $id = $data['idAlumno'];
                                    if (haveUser($id, $link)) {
                                        $active = 'disabled';
                                    } else {
                                        $active = '';
                                    }
                                    $data['acciones'] = '<button class="btn btn-success" data-placement="left" data-toggle="modal" data-target="#update" title="Editar" onclick="datosFila(' . $id . ')"><i class="zmdi zmdi-edit"></i></button> <button class="btn btn-default" data-placement="left" data-toggle="modal" data-target="#usuario" title="Asignar usuario" onclick="propietario(' . $id . ')" ' . $active . '><i class="zmdi zmdi-assignment-account"></i></button> <button class="btn btn-danger" title="Eliminar" onclick="eliminar(' . $id . ')"><i class="zmdi zmdi-delete"></i></button>';
                                    $matricula = $data['matricula'];
                                    $nombre = $data['nombre'];
                                    $apellidoPaterno = $data['apellidoPaterno'];
                                    $apellidoMaterno = $data['apellidoMaterno'];
                                    $acciones = $data['acciones'];
                                    echo "<tr>
                                          <td>$matricula</td>
                                          <td>$nombre</td>
                                          <td>$apellidoPaterno</td>
                                          <td>$apellidoMaterno</td>
                                          <td>$acciones</td>
                                          </tr>";
                                }
                            }

                            function haveUser($id, $link) {
                                $query = "SELECT idUsuario FROM usuario WHERE idUsuario = $id";
                                $result = mysqli_query($link, $query);
                                if ($result) {
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                } else {
                                    return false;
                                }
                            }
                             */
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="js/becas.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>