<?php
include 'database/DatabaseConnect.php';
session_start();
if (isset($_SESSION['usuario'])) {
    if (!DatabaseConnect::isConnected()) {
        
    } else {
        $con = DatabaseConnect::getConnection();
        $id_usuario = $_SESSION['usuario']['id_usuario'];
        $query_usuario = "SELECT * FROM usuario NATURAL JOIN rol WHERE id_usuario = $id_usuario";
        $result_usuario = mysqli_query($con, $query_usuario);
        if ($result_usuario) {
            foreach ($result_usuario as $usuariosesion) {
                $id_usuario = $usuariosesion['id_usuario'];
                $usuario = $usuariosesion['usuario'];
                $rol_usuario = $usuariosesion['rol'];
                $_id_rol_usuario = $usuariosesion['id_rol'];
                
                $nombre_completo_usuario = $usuariosesion['nombre_completo'];
            }
        }
    }
} else {
    header('Location: index.php');
}