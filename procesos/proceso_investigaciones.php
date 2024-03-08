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
            $proyecto = validateData($_POST['txtProyecto']);
            
            $participacion = validateData($_POST['cboParticipacion']);
            $fecha = validateData($_POST['txtFecha']);
            
            $query = "INSERT INTO investigacion(nombre_proyecto,fecha,id_tipo_participacion,id_alumno) 
                VALUES('$proyecto','$fecha',$participacion,$id_alumno)";
            
            $result = mysqli_query($con, $query);
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'ERROR';
            }
            break;
        case 2:
            $id = validateData($_POST['id']);
            $proyecto = validateData($_POST['txtProyecto']);
            
            $participacion = validateData($_POST['cboParticipacion']);
            $fecha = validateData($_POST['txtFecha']);
            
            $query = "UPDATE investigacion SET nombre_proyecto = '$proyecto', id_tipo_participacion = $participacion, fecha = '$fecha' WHERE id_investigacion = $id";
            
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
