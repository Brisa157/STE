<?php include './include/session.php'; 
if(!isset($_REQUEST['id'])){
    header('Location: becas.php');
}
?>
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
            <?php if($_REQUEST['id'] == 0){?>
            <div class="container-fluid">
                <h2>Asignar Beca</h2>
                <form id="frmCreate" method="post">
                    <input type="hidden" id="idAlumno" name="idAlumno">
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
                        <input type="text" class="form-control campoNumero" name="txtSemestre" required>
                    </div>
                    <div class="form-group">
                        <label>Beca</label>
                        <select class="form-control" name="cboBeca" required>
                            <?php
                                $query = 'SELECT id_beca, beca FROM beca';
                                $result = mysqli_query($con, $query);
                                if($result){
                                    $items = '<option value="">Seleccione uno</option>';
                                    foreach ($result as $data) {
                                        $items = $items.'<option value="' . $data['id_beca'] .'">'.$data['beca'].'</option>';
                                    }
                                }else{
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
                                if($result){
                                    $items = '<option value="">Seleccione uno</option>';
                                    foreach ($result as $data) {
                                        $items = $items.'<option value="' . $data['id_periodo'] .'">'.$data['periodo'].'</option>';
                                    }
                                }else{
                                    echo "Error al realizar consulta";
                                }
                                echo $items;
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">&nbsp; Asignar Beca</button>
                </form>
            </div>
            <?php }else if($_REQUEST['id'] > 0){?>
            <div class="container-fluid">
                <h2>Actualizar</h2>
                <?php
                $query = "SELECT id_asigna_beca, numero_control, nombre_completo, asigna_beca.semestre, asigna_beca.id_beca, asigna_beca.id_periodo
                          FROM asigna_beca INNER JOIN alumno ON asigna_beca.id_alumno = alumno.id_alumno 
                          INNER JOIN beca ON asigna_beca.id_beca = beca.id_beca WHERE id_asigna_beca = ".$_REQUEST['id'];
                $result = mysqli_query($con, $query);
                if ($result) {
                    foreach ($result as $data) {
                        $numero_control = $data['numero_control'];
                        $nombre_completo = $data['nombre_completo'];
                        $semestre = $data['semestre'];
                        $id_beca = $data['id_beca'];
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
                        <label>Semestre</label>
                        <input type="text" class="form-control campoNumero" value="<?php echo $semestre ?>" name="txtSemestre" required>
                    </div>
                    <div class="form-group">
                        <label>Beca</label>
                        <select class="form-control" name="cboBeca" required>
                        <?php
                            $query = 'SELECT id_beca, beca FROM beca';
                            $result = mysqli_query($con, $query);
                            if($result){
                                
                                $items = '';
                                foreach ($result as $data) {
                                    $selected = $id_beca == $data['id_beca'] ?'selected':'';
                                    $items = $items.'<option value="' . $data['id_beca'] .'" '.$selected.'>'.$data['beca'].'</option>';
                                }
                            }else{
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
                            if($result){
                                
                                $items = '';
                                foreach ($result as $data) {
                                    $selected = $id_periodo == $data['id_periodo'] ?'selected':'';
                                    $items = $items.'<option value="' . $data['id_periodo'] .'" '.$selected.'>'.$data['periodo'].'</option>';
                                }
                            }else{
                                echo "Error al realizar consulta";
                            }
                            echo $items;
                        ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">&nbsp; Actualizar</button>
                </form>
            </div>
            <?php }else{
                
            }
            ?>
        </div>
        <datalist id="listAlumno" name="listAlumno">
            <?php
                $query = 'SELECT numero_control, nombre_completo FROM alumno WHERE is_alumno = 1';
                $result = mysqli_query($con, $query);
                if($result){
                    $items = '';
                    foreach ($result as $data) {
                        $items = $items.'<option value="' . $data['numero_control'] .' - '. $data['nombre_completo'] . '"></option>';
                    }
                }else{
                    echo "Error al realizar consulta";
                }
                echo $items;
            ?>
        </datalist>
        <script src="js/becas.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>