<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
            $actividad = validateData($_POST['txtActividad']);
            $descripcion = validateData($_POST['txtDescripcion']);
            $certificacion_nombre = $_FILES['fileCertificacion']['name'];
            $evidencia_extension = $_FILES['fileCertificacion']['type'];

            if (!(strpos($evidencia_extension, "pdf"))) {
                echo "Solo se permiten archivos PDF";
            } else {
                $query = "INSERT INTO credito(actividad, descripcion, tipo_credito, id_alumno)VALUES('$actividad','$descripcion',2,$id_alumno)";
                $result = mysqli_query($con, $query);
                $id_credito = mysqli_insert_id($con);
                if ($result) {
                    $nombre_archivo = 'Credito' . $id_credito .'_'.$id_alumno.'.pdf';
                    if (move_uploaded_file($_FILES['fileCertificacion']['tmp_name'], '../documentos/' . $nombre_archivo)) {
                        $query = "UPDATE credito SET archivo = '$nombre_archivo' WHERE id_credito = $id_credito";
                        $result = mysqli_query($con, $query);
                        if ($result) {
                            echo 'CORRECTO';
                        } else {
                            echo 'ERROR';
                        }
                    } else {
                        echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                    }
                } else {
                    echo 'ERROR';
                }
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
