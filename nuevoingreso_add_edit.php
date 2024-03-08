<?php
include './include/session.php';
if (!isset($_REQUEST['id'])) {
    header('Location: nuevoingreso.php');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head> 
        <meta charset="UTF-8">
        <title>Nuevo Ingreso</title>
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
                    <h1 class="all-tittles">Nuevo Ingreso</h1>
                </div>
            </div>
            <?php if ($_REQUEST['id'] == 0) { ?>
                <div class="container-fluid">
                    <h2>Registrar</h2>
                    <form id="frmCreate" method="post">
                        <div class="form-group">
                            <label>Nombre Completo</label>
                            <input type="text" class="form-control" name="txtNombre" required>
                        </div>
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control" name="cboCarrera" required>
                                <?php
                                $query = 'SELECT id_carrera, carrera FROM carrera';
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $items = '<option value="">Seleccione uno</option>';
                                    foreach ($result as $data) {
                                        $items = $items . '<option value="' . $data['id_carrera'] . '">' . $data['carrera'] . '</option>';
                                    }
                                } else {
                                    echo "Error al realizar consulta";
                                }
                                echo $items;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periodo</label>
                            <select class="form-control" name="cboPeriodo" required>
                                <?php
                                $query = 'SELECT id_periodo, periodo FROM periodo';
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $items = '<option value="">Seleccione uno</option>';
                                    foreach ($result as $data) {
                                        $items = $items . '<option value="' . $data['id_periodo'] . '">' . $data['periodo'] . '</option>';
                                    }
                                } else {
                                    echo "Error al realizar consulta";
                                }
                                echo $items;
                                ?>
                             </select>
                        </div>
                        <div class="form-group">
                            <label>Certificado De Bachillerato</label>
                            <label class="radio-inline"><input type="radio" value="1" name="rbtnCertificado" required>Si</label>
                            <label class="radio-inline"><input type="radio" value="0" name="rbtnCertificado" required>No</label>
                        </div>
                        <div class="form-group">
                            <label>Calificación</label>
                            <input type="text" class="form-control" name="txtCalificacion" required>
                        </div>
                        <div class="form-group">
                            <label>Entrevista</label>
                            <label class="radio-inline"><input type="radio" value="1" name="rbtnEntrevista" required>Si</label>
                            <label class="radio-inline"><input type="radio" value="0" name="rbtnEntrevista" required>No</label>
                        </div>
                        <div class="form-group">
                            <label>Carta Entregada</label>
                            <label class="radio-inline"><input type="radio" value="1" name="rbtnCartaEntregada" required>Si</label>
                            <label class="radio-inline"><input type="radio" value="0" name="rbtnCartaEntregada" required>No</label>
                        </div>
                        <button type="submit" class="btn btn-primary">&nbsp; Registrar</button>
                    </form>
                </div>
            <?php } else if ($_REQUEST['id'] > 0) { ?>
                <div class="container-fluid">
                    <h2>Actualizar</h2>
                    <?php
                        $query = "SELECT * FROM alumno WHERE id_alumno = ". $_REQUEST['id'];
                        $result = mysqli_query($con, $query);
                        if ($result) {
                            foreach ($result as $data) {
                                $numero_control = $data['numero_control'];
                                $nombre_completo = $data['nombre_completo'];
                                $id_carrera = $data['id_carrera'];
                                $id_periodo = $data['id_periodo'];
                                $certificado = $data['certificado_bachillerato'];
                                $calificacion = $data['certificado_calificacion'];
                                $entrevista = $data['entrevista'];
                                $carta_entregada = $data['carta_entregada'];
                                $puntaje_seleccion = $data['puntaje_seleccion'];
                            }
                        }
                        ?>
                    <form id="frmUpdate" method="post">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                        <div class="form-group">
                            <label>No. Control</label>
                            <input type="text" class="form-control" value="<?php echo $numero_control ?>" name="txtNumeroControl" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre Completo</label>
                            <input type="text" class="form-control" value="<?php echo $nombre_completo ?>" name="txtNombre" required>
                        </div>
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control" name="cboCarrera" required>
                                <?php
                                $query = 'SELECT id_carrera, carrera FROM carrera';
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $items = '<option value="">Seleccione uno</option>';
                                    foreach ($result as $data) {
                                        $selected = $id_carrera == $data['id_carrera'] ?'selected':'';
                                        $items = $items.'<option value="' . $data['id_carrera'] .'" '.$selected.'>'.$data['carrera'].'</option>';
                                    }
                                } else {
                                    echo "Error al realizar consulta";
                                }
                                echo $items;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periodo</label>
                            <select class="form-control" name="cboPeriodo" required>
                                <?php
                                $query = 'SELECT id_periodo, periodo FROM periodo';
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $items = '';
                                    foreach ($result as $data) {
                                        $selected = $id_periodo == $data['id_periodo'] ?'selected':'';
                                        $items = $items.'<option value="' . $data['id_periodo'] .'" '.$selected.'>'.$data['periodo'].'</option>';
                                    }
                                } else {
                                    echo "Error al realizar consulta";
                                }
                                echo $items;
                                ?>
                             </select>
                        </div>
                        <div class="form-group">
                            <label>Certificado De Bachillerato</label>
                            <label class="radio-inline"><input type="radio" value="1" name="rbtnCertificado" required <?php echo $certificado == 1 ? "checked":""; ?>>Si</label>
                            <label class="radio-inline"><input type="radio" value="0" name="rbtnCertificado" required <?php echo $certificado == 0 ? "checked":""; ?>>No</label>
                        </div>
                        <div class="form-group">
                            <label>Calificación</label>
                            <input type="text" class="form-control campoNumero" name="txtCalificacion" value="<?php echo $calificacion ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Entrevista</label>
                            <label class="radio-inline"><input type="radio" value="1" name="rbtnEntrevista" required <?php echo $entrevista == 1 ? "checked":""; ?>>Si</label>
                            <label class="radio-inline"><input type="radio" value="0" name="rbtnEntrevista" required <?php echo $entrevista == 0 ? "checked":""; ?>>No</label>
                        </div>
                        <div class="form-group">
                            <label>Carta Entregada</label>
                            <label class="radio-inline"><input type="radio" value="1" name="rbtnCartaEntregada" required <?php echo $carta_entregada == 1 ? "checked":""; ?>>Si</label>
                            <label class="radio-inline"><input type="radio" value="0" name="rbtnCartaEntregada" required <?php echo $carta_entregada == 0 ? "checked":""; ?>>No</label>
                        </div>
                        <div class="form-group">
                            <label>Puntaje Del Examén De Selección</label>
                            <input type="text" class="form-control campoNumero" name="txtPuntajeSeleccion" value="<?php echo $puntaje_seleccion ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">&nbsp; Actualizar</button>
                    </form>
                </div>
                <?php
            } else {
                
            }
            ?>
        </div>
        <script src="js/nuevoingreso.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>