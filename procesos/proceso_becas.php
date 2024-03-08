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
            $beca = validateData($_POST['cboBeca']);
            $periodo = validateData($_POST['cboPeriodo']);
            $semestre = validateData($_POST['txtSemestre']);
            
            $query = "INSERT INTO asigna_beca(id_alumno,id_beca,id_periodo, semestre) 
                VALUES($id_alumno,'$beca',$periodo, $semestre)";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $beca = validateData($_POST['cboBeca']);
            $periodo = validateData($_POST['cboPeriodo']);
            $semestre = validateData($_POST['txtSemestre']);
            
            $query = "UPDATE asigna_beca 
                      SET id_beca = $beca, id_periodo = $periodo, semestre = $semestre WHERE id_asigna_beca = $id";
            
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
