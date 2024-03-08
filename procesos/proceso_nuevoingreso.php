<?php
include '../database/DatabaseConnect.php';
if (isset($_REQUEST['opt'])) {
    $opt = $_REQUEST['opt'];
} else {
    $opt = 0;
}
$con = DatabaseConnect::getConnection();

if (DatabaseConnect::isConnected()) {
    switch ($opt) {
        case 1:
            $nombre = validateData($_POST['txtNombre']);
            $carrera = validateData($_POST['cboCarrera']);
            $periodo = validateData($_POST['cboPeriodo']);
            $certificado = validateData($_POST['rbtnCertificado']);
            $calificacion = validateData($_POST['txtCalificacion']);
            $entrevista = validateData($_POST['rbtnEntrevista']);
            $carta_entregada = validateData($_POST['rbtnCartaEntregada']);
            $fecha_registro = date("Y-m-d");
            
            $query = "INSERT INTO alumno(nombre_completo, id_carrera, id_periodo, certificado_bachillerato, certificado_calificacion, entrevista, carta_entregada, fecha_registro, is_alumno) 
                VALUES('$nombre',$carrera, $periodo, $certificado, $calificacion, $entrevista, $carta_entregada, '$fecha_registro',0)";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $numero_control = validateData($_POST['txtNumeroControl']);
            $nombre = validateData($_POST['txtNombre']);
            $carrera = validateData($_POST['cboCarrera']);
            $periodo = validateData($_POST['cboPeriodo']);
            $certificado = validateData($_POST['rbtnCertificado']);
            $calificacion = validateData($_POST['txtCalificacion']);
            $entrevista = validateData($_POST['rbtnEntrevista']);
            $carta_entregada = validateData($_POST['rbtnCartaEntregada']);
            $puntaje_seleccion = validateData($_POST['txtPuntajeSeleccion']);
            if($puntaje_seleccion > 70){
                $is_alumno = 1;
                $semestre = 1;
            }else{
                $is_alumno = 0;
                $semestre = "'null'";
            }
            
            $query = "UPDATE alumno SET numero_control = $numero_control, nombre_completo = '$nombre', id_carrera = $carrera, id_periodo = $periodo, certificado_bachillerato = $certificado, certificado_calificacion = $calificacion, entrevista = $entrevista, carta_entregada = $carta_entregada, puntaje_seleccion = $puntaje_seleccion, is_alumno = $is_alumno, semestre = $semestre WHERE id_alumno = $id";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            
            break;
        case 3:
            
            break;
        case 4:
            
            break;

    }
} else {
    $error = DatabaseConnect::errorConnection();
    if ($error == 1045) {
        echo 'Error al accesar MySQL';
    } else if ($error == 1049) {
        echo 'Base de datos desconocida';
    } else {
        echo 'Sin conexión al servidor';
    }
}

function validateData($data) {
    $d = trim(stripslashes(htmlspecialchars(strip_tags(($data)))));
    return $d;
}
