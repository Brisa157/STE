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
            $semestre = validateData($_POST['txtSemestre']);
            $nivel = validateData($_POST['txtNivel']);
            $periodo = validateData($_POST['cboPeriodo']);
            
            $query = "INSERT INTO ingles(id_alumno,semestre,nivel,curso_nivelacion,examen_ubicacion, id_periodo) 
                VALUES($id_alumno,$semestre,$nivel,0,0, $periodo)";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $semestre = validateData($_POST['txtSemestre']);
            $calificacion = validateData($_POST['txtCalificacion']) != ""? validateData($_POST['txtCalificacion']): 'null';
            $periodo = validateData($_POST['cboPeriodo']);
            $query = "UPDATE ingles 
                      SET semestre = $semestre, calificacion_final = $calificacion, id_periodo = $periodo WHERE id_ingles = $id";
            
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
