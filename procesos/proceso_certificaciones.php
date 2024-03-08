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
            $vigencia = validateData($_POST['txtVigencia']);
            $periodo = validateData($_POST['cboPeriodo']);
            $certificacion_nombre = $_FILES['fileCertificacion']['name'];
            $certificacion_extension = $_FILES['fileCertificacion']['type'];

            if (!(strpos($certificacion_extension, "pdf"))) {
                echo "Solo se permiten archivos PDF";
            } else {
                $query = "INSERT INTO certificacion(id_alumno, vigencia, id_periodo)VALUES($id_alumno, '$vigencia',$periodo)";
                $result = mysqli_query($con, $query);
                $id_certificacion = mysqli_insert_id($con);
                if ($result) {
                    $nombre_archivo = 'Certificacion_' . $id_certificacion .'_'.$id_alumno.'.pdf';
                    if (move_uploaded_file($_FILES['fileCertificacion']['tmp_name'], '../documentos/' . $nombre_archivo)) {
                        $query = "UPDATE certificacion SET certificado = '$nombre_archivo' WHERE id_certificaciones = $id_certificacion";
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
            /*
              $query = "INSERT INTO asigna_beca(id_alumno,id_beca,id_periodo)
              VALUES($id_alumno,'$beca',$periodo)";

              $result = mysqli_query($con, $query);
              if ($result) {
              echo 'CORRECTO';
              } else {
              echo 'ERROR';
              }
             */
            break;
        case 2:
            $id = validateData($_POST['id']);
            $beca = validateData($_POST['cboBeca']);
            $periodo = validateData($_POST['cboPeriodo']);

            /*
              $query = "UPDATE asigna_beca
              SET id_beca = $beca, id_periodo = $periodo WHERE id_asigna_beca = $id";

              $result = mysqli_query($con, $query);
              if ($result) {
              echo 'CORRECTO';
              } else {
              echo 'ERROR';
              }
             */
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
