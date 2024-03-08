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
            $asesor_externo = validateData($_POST['txtAsesorExterno']);
            $asesor_interno = validateData($_POST['txtAsesorInterno']);
            $fecha_inicio = validateData($_POST['txtFechaInicio']);
            
            $query = "INSERT INTO residencia(id_alumno, empresa, asesor_externo, asesor_interno, fecha_inicio) 
                VALUES($id_alumno,'$empresa','$asesor_externo','$asesor_interno','$fecha_inicio')";
            
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
            $asesor_externo = validateData($_POST['txtAsesorExterno']);
            $asesor_interno = validateData($_POST['txtAsesorInterno']);
            $fecha_inicio = validateData($_POST['txtFechaInicio']);
            $fecha_liberacion = $_POST['txtFechaLiberacion'] != '' ? "'".validateData($_POST['txtFechaLiberacion'])."'" : 'null';
            $query = "UPDATE residencia 
                SET empresa = '$empresa', asesor_externo = '$asesor_externo', asesor_interno = '$asesor_interno', fecha_inicio = '$fecha_inicio', fecha_liberacion = $fecha_liberacion
                    WHERE id_residencia = $id";
            
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
