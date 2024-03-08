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
            $institucion = validateData($_POST['txtInstitucion']);
            $motivo = validateData($_POST['txtMotivo']);
            $fecha_salida = validateData($_POST['txtFechaSalida']);
            $fecha_regreso = validateData($_POST['txtFechaRegreso']);
            
            $query = "INSERT INTO movilidad(semestre, motivo, institucion, fecha_salida, fecha_regreso, id_alumno) 
                VALUES($semestre,'$motivo','$institucion','$fecha_salida','$fecha_regreso',$id_alumno)";
            
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
            $institucion = validateData($_POST['txtInstitucion']);
            $motivo = validateData($_POST['txtMotivo']);
            $fecha_salida = validateData($_POST['txtFechaSalida']);
            $fecha_regreso = validateData($_POST['txtFechaRegreso']);
            
            $query = "UPDATE movilidad SET semestre = $semestre, motivo = '$motivo', institucion = '$institucion', fecha_salida = '$fecha_salida', fecha_regreso = '$fecha_regreso' WHERE id_movilidad = $id";
            
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
