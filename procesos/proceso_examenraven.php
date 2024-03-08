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
            $puntaje = validateData($_POST['txtPuntaje']);
            $comentarios = validateData($_POST['txtComentarios']);
            
            $query = "INSERT INTO examen_raven(id_alumno,puntaje,comentarios) VALUES($id_alumno,'$puntaje','$comentarios')";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $puntaje = validateData($_POST['txtPuntaje']);
            $comentarios = validateData($_POST['txtComentarios']);
            
            $query = "UPDATE examen_raven 
                      SET puntaje = '$puntaje', comentarios = '$comentarios' WHERE id_examen_raven = $id";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            
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
