$(window).load(function () {
    //$("#cargandopagina").fadeOut("slow");
});

$('#frmLogin').on('submit', function () {
    $.ajax({
        url: "procesos/proceso_index.php?opt=1", type: "POST", data: $(this).serialize(),
        beforeSend: function () {
            //$("#cargandofuncion").show();
        },
        success: function (resp) {
            if (resp === "DENEGADO") {
                alertaPersonalizada("Seguridad", "fa fa-lock", "Usuario y/o contraseña son incorrectos", "red");
                $("[name='txtContrasenia']").val("");
            } else if (resp === "ERROR") {
                alertaPersonalizada("Error de sistema",
                        "fa fa-warning", "Algo salió mal, vuelva a intentarlo." + "<hr>" +
                        "Error al realizar la validación de acceso.",
                        "red");
                $("[name='txtContrasenia']").val("");
            } else if (resp === "PERMITIDO") {
                location.href = "home.php";
            } else {
                alertaPersonalizada('Error de sistema!', 'fa fa-warning',
                        'Base de datos no disponible:' + '<hr>' + resp,
                        'orange');
                $("[name='txtContrasenia']").val("");
            }
        },
        error: function () {
            console.log("Problemas con la petición.");
        },
        complete: function () {
            //$("#cargandofuncion").hide();
        }
    });
    return false;
});

function alertaPersonalizada(title, icon, content, type) {
    $.alert({
        title: title, icon: icon, content: content, type: type, animation: 'scale', closeAnimation: 'scale', animateFromElement: false, typeAnimated: true
    });
}