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
            $alumno = explode("-", $_POST['alumno']);
            $numero_control = validateData($alumno[0]);
            $query = "SELECT id_alumno, numero_control, nombre_completo, semestre, carrera FROM alumno NATURAL JOIN carrera WHERE numero_control = $numero_control";
            $result = mysqli_query($con, $query);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row['id_alumno'].'||'.$row['numero_control'].'||'.$row['nombre_completo'].'||'.$row['semestre'].'||'.$row['carrera'];
                } else {
                    echo 0;
                }
            } else {
                echo "ERROR";
            }
            break;
        case 2:

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
