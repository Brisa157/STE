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
            $usuario = validateData(strtolower($_POST['txtUsuario']));
            $contrasenia = $_POST['txtContrasenia'];
            $query = "SELECT id_usuario, id_rol FROM usuario WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
            $result = mysqli_query($con, $query);

            if ($result) {
                if (mysqli_num_rows($result) == 0) {
                    echo 'DENEGADO';
                } else {
                    $row = mysqli_fetch_assoc($result);
                    $id_usuario = $row['id_usuario'];
                    $id_rol = $row['id_rol'];
                    session_start();
                    $_SESSION['usuario']['id_usuario'] = $id_usuario;
                    $_SESSION['usuario']['id_rol'] = $id_rol;
                    echo 'PERMITIDO';
                }
            } else {
                echo 'ERROR';
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
