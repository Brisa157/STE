<?php
include './include/session.php';
if (!isset($_REQUEST['id'])) {
    header('Location: niveles.php');
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Niveles</title>
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
                    <h1 class="all-tittles">Niveles</h1>
                </div>
            </div>
                <?php if ($_REQUEST['id'] == 0) { ?>
                <div class="container-fluid">
                    <h2>Asignar Nivel</h2>
                    <form id="frmCreate" method="post">
                        <input type="hidden" name="idAlumno" id="idAlumno">
                        <div class="form-group">
                            <label>Alumno</label>
                            <input class="form-control" list="listAlumno" name="txtAlumno" id="txtAlumno" required>
                            <p id="errorAlumno" class="text-danger"></p>
                        </div>
                        <div id="datosAlumno" class="form-group">
                            <label>No. Control</label>
                            <p id="numeroAlumno"></p>
                            <label>Nombre Completo</label>
                            <p id="nombreAlumno"></p>
                            <label>Carrera</label>
                            <p id="carreraAlumno"></p>
                        </div>
                        <div class="form-group">
                            <label>Semestre</label>
                            <input class="form-control campoNumero" name="txtSemestre" required>
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
                            <label>Nivel</label>
                            <input class="form-control campoNumero" name="txtNivel" required>
                        </div>
                        <button type="submit" class="btn btn-primary">&nbsp; Asignar Nivel</button>
                    </form>
                </div>
                <?php } else if ($_REQUEST['id'] > 0) { ?>
                <div class="container-fluid">
                    <h2>Actualizar</h2>
                    <?php
                    $query = "SELECT ingles.id_periodo, calificacion_final, numero_control, nombre_completo, ingles.semestre, nivel FROM alumno INNER JOIN ingles ON alumno.id_alumno = ingles.id_alumno NATURAL JOIN carrera WHERE id_ingles = " . $_REQUEST['id'];
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        foreach ($result as $data) {
                            $numero_control = $data['numero_control'];
                            $nombre_completo = $data['nombre_completo'];
                            $semestre = $data['semestre'];
                            $nivel = $data['nivel'];
                            $calificacion = $data['calificacion_final'];
                            $id_periodo = $data['id_periodo'];
                        }
                    }
                    ?>
                    <form id="frmUpdate" method="post">
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
                        <div class="form-group">
                            <label>No. Control</label>
                            <div><?php echo $numero_control ?></div>
                        </div>
                        <div class="form-group">
                            <label>Nombre Del Alumno</label>
                            <div><?php echo $nombre_completo ?></div>
                        </div>
                        <div class="form-group">
                            <label>Nivel Actual:</label>
                            <div><?php echo $nivel ?></div>
                        </div>
                        <div class="form-group">
                            <label>Semestre</label>
                            <input class="form-control campoNumero" name="txtSemestre" value="<?php echo $semestre ?>" required>
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
                                        $selected = $id_periodo == $data['id_periodo'] ? 'selected' : '';
                                        $items = $items . '<option value="' . $data['id_periodo'] . '" ' . $selected . '>' . $data['periodo'] . '</option>';
                                    }
                                } else {
                                    echo "Error al realizar consulta";
                                }
                                echo $items;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Calificación</label>
                            <input class="form-control campoNumero" value="<?php echo $calificacion ?>" name="txtCalificacion">
                        </div>
                        <button type="submit" class="btn btn-primary">&nbsp; Actualizar Nivel</button>
                    </form>
                </div>
            <?php
            } else {
                
            }
            ?>
        </div>
        <datalist class="form-control" id="listAlumno" name="listAlumno">
            <?php
            $query = 'SELECT numero_control, nombre_completo FROM alumno WHERE is_alumno = 1';
            $result = mysqli_query($con, $query);
            if ($result) {
                $items = '';
                foreach ($result as $data) {
                    $items = $items . '<option value="' . $data['numero_control'] . ' - ' . $data['nombre_completo'] . '"></option>';
                }
            } else {
                echo "Error al realizar consulta";
            }
            echo $items;
            ?>
        </datalist>
        <script src="js/niveles.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>