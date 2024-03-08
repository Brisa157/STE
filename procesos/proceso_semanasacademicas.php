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
            $fecha_salida = validateData($_POST['txtFechaSalida']);
            $fecha_regreso = validateData($_POST['txtFechaRegreso']);
            $telefono_tutor = validateData($_POST['txtTelefonoTutor']);
            $query = "INSERT INTO semana_academica(semestre, telefono_tutor, fecha_salida, fecha_regreso, id_alumno) VALUES($semestre,'$telefono_tutor','$fecha_salida','$fecha_regreso',$id_alumno)";
            
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
            $fecha_salida = validateData($_POST['txtFechaSalida']);
            $fecha_regreso = validateData($_POST['txtFechaRegreso']);
            $telefono_tutor = validateData($_POST['txtTelefonoTutor']);
            $firmado = validateData($_POST['rbtnFirmado']);
            
            $query = "UPDATE semana_academica SET semestre = $semestre, fecha_salida = '$fecha_salida', fecha_regreso = '$fecha_regreso', telefono_tutor = '$telefono_tutor', is_firmado = $firmado WHERE id_semana_academica = $id";
            
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
