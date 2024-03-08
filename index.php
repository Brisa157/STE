<?php
include './include/version.php';
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="lib/SRCB/css/material-design-iconic-font.min.css">
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="lib/SRCB/css/normalize.css">
        <link rel="stylesheet" href="lib/SRCB/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/SRCB/css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="lib/SRCB/css/style.css">
        <link rel="stylesheet" href="lib/SRCB/css/login.css">
        <script src="lib/SRCB/js/jquery-1.11.2.min.js"></script>
        <script src="lib/SRCB/js/modernizr.js"></script>
        <script src="lib/SRCB/js/bootstrap.min.js"></script>
        <script src="lib/SRCB/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="lib/SRCB/js/main.js"></script>
        <!--JQueryConfirm-->
        <link rel="stylesheet" type="text/css" href="lib/jqueryconfirm/css/jquery-confirm.css">
        <script src="lib/jqueryconfirm/js/jquery-confirm.js"></script>
        <!--link rel="stylesheet" type="text/css" href="css/cargando.css"-->
    </head>
    <body class="full-cover-background" 
          style="background: url('img/img1.jpg') no-repeat center center fixed; background-size: cover;">
        <!--div id="cargandopagina"></div>
        <div id="cargandofuncion" hidden></div-->
        <div class="form-container">
            <!--img src="img/logoetutor.jpeg" class="img-responsive"-->
            <h4 class="text-center all-tittles" style="margin-bottom: 30px; background: #B71C1C; padding: 10px">Iniciar Sesión</h4>
            <form id="frmLogin" method="POST">
                <div class="group-material-login">
                    <input type="text" name="txtUsuario" class="material-login-control" required>
                    <span class="highlight-login"></span>
                    <span class="bar-login"></span>
                    <label><i class="zmdi zmdi-account"></i> &nbsp; Usuario</label>
                </div><br>
                <div class="group-material-login">
                    <input type="password" name="txtContrasenia" class="material-login-control" required>
                    <span class="highlight-login"></span>
                    <span class="bar-login"></span>
                    <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
                </div>
                <br>
                <button id="btnLogin" class="btn-login" type="submit">
                    Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
        <script src="js/Index.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>