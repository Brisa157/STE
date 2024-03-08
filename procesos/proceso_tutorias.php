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
            $id_alumno = validateData($_POST['idAlumno']);
            $tutor = validateData($_POST['txtTutor']);
            $semestre = validateData($_POST['txtSemestre']);
            $periodo = validateData($_POST['cboPeriodo']);
            
            $query = "INSERT INTO tutoria(id_alumno,tutor,semestre,id_periodo) VALUES($id_alumno,'$tutor',$semestre,$periodo)";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $tutor = validateData($_POST['txtTutor']);
            $semestre = validateData($_POST['txtSemestre']);
            $periodo = validateData($_POST['cboPeriodo']);
            
            $query = "UPDATE tutoria SET tutor = '$tutor', tutoria.semestre = $semestre ,tutoria.id_periodo = $periodo WHERE id_tutoria = $id";
            
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
