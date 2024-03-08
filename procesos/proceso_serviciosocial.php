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
            $empresa = validateData($_POST['txtEmpresa']);
            $asesor = validateData($_POST['txtAsesor']);
            $fecha_inicio = validateData($_POST['txtFechaInicio']);
            
            $query = "INSERT INTO servicio_social(id_alumno, empresa, asesor, fecha_inicio) 
                VALUES($id_alumno,'$empresa','$asesor','$fecha_inicio')";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $empresa = validateData($_POST['txtEmpresa']);
            $asesor = validateData($_POST['txtAsesor']);
            $fecha_inicio = validateData($_POST['txtFechaInicio']);
            $fecha_liberacion = $_POST['txtFechaLiberacion'] != '' ? "'".validateData($_POST['txtFechaLiberacion'])."'" : 'null';
            $query = "UPDATE servicio_social 
                SET empresa = '$empresa', asesor = '$asesor', fecha_inicio = '$fecha_inicio', fecha_liberacion = $fecha_liberacion
                    WHERE id_servicio_social = $id";
            
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
