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
            $fecha_inicio = validateData($_POST['txtFechaInicio']);
            
            $query = "INSERT INTO canalizacion(fecha_inicio,id_alumno) 
                VALUES('$fecha_inicio',$id_alumno)";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $fecha_inicio = validateData($_POST['txtFechaInicio']);
            $fecha_final = $_POST['txtFechaFinal'] != '' ? "'".validateData($_POST['txtFechaFinal'])."'" : 'null';
            
            $query = "UPDATE canalizacion 
                      SET fecha_inicio = '$fecha_inicio', fecha_final = $fecha_final WHERE id_canalizacion = $id";
            
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
