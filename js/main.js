$("#logout").click(function () {
    $.confirm({
        title: 'Cerrar sesion',
        content: '¿Está seguro de que desea cerrar sesión?',
        icon: 'fa fa-question',
        type: 'orange',
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        typeAnimated: true,
        buttons: {
            no: function () {
            },
            si: {
                text: 'Si',
                btnClass: 'btn-orange',
                action: function () {
                    cerrarSesion();
                }
            }
        }
    });
});
$("#txtAlumno").keyup(function () {
    if ($(this).val() === "") {
        $('#errorAlumno').html("");
        $('#datosAlumno').hide();
    } else {
        $.ajax({
            url: "procesos/proceso_alumnos.php?opt=1", type: "POST", async: false, data: "alumno=" + $(this).val(),
            success: function (resp) {
                if (resp == 0) {
                    $('#errorAlumno').html("Alumno no existe o nombre incorrecto, Verifique");
                    $('#idAlumno').val(0);
                    $('#datosAlumno').hide();
                }else if(resp == "ERROR"){
                    $('#errorAlumno').html("Alumno no existe o nombre incorrecto, Verifique");
                    $('#idAlumno').val(0);
                    $('#datosAlumno').hide();
                }else{
                    d = resp.split('||');
                    $('#errorAlumno').html("");
                    $('#idAlumno').val(d[0]);
                    $('#numeroAlumno').html(d[1]);
                    $('#nombreAlumno').html(d[2]);
                    $('#carreraAlumno').html(d[4]);
                    $('#datosAlumno').show();
                }
            }
        });
    }
});
$("#myprofile").click(function () {
    location.href = "profile.php";
});
function cerrarSesion() {
    $.post('procesos/logout.php', function (data) {
        location.href = "index.php";
    });
}

function acciones(url, data, loc) {
    $.ajax({
        url: url, type: "POST", data: data,
        beforeSend: function () {
        },
        success: function (resp) {
            if (resp === "CORRECTO") {
                correctoAlertaLocation(loc);
            } else if (resp === "ERROR") {
                alertaPersonalizada('Error de sistema!', 'fa fa-warning',
                        'Error de código:' + '<hr>' + resp,
                        'orange');
            } else {
                alert(resp);
            }
        },
        error: function () {
            $.alert({
                title: "Error De Petición",
                icon: "fa fa-minus-circle",
                content: "Algo salió mal y/o Archivo no existe.",
                type: "red",
                animation: 'scale',
                closeAnimation: 'scale',
                animateFromElement: false
            });
            console.log("Problemas con la petición.");
        },
        complete: function () {
        }
    });
}

function accionesConArchivo(url, data, loc) {
    $.ajax({
        url: url, type: "POST",
        data: new FormData(data),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
        },
        success: function (resp) {
            if (resp === "CORRECTO") {
                correctoAlertaLocation(loc);
            } else if (resp === "ERROR") {
                alertaPersonalizada('Error de sistema!', 'fa fa-warning',
                        'Error de código:' + '<hr>' + resp,
                        'orange');
            } else {
                alert(resp);
            }
        },
        error: function () {
            $.alert({
                title: "Error De Petición",
                icon: "fa fa-minus-circle",
                content: "Algo salió mal y/o Archivo no existe.",
                type: "red",
                animation: 'scale',
                closeAnimation: 'scale',
                animateFromElement: false
            });
            console.log("Problemas con la petición.");
        },
        complete: function () {
        }
    });
}
function correctoAlerta() {
    $.confirm({
        title: 'Correcto',
        content: 'Operación realizada con éxito.',
        icon: 'fa fa-check',
        type: 'green',
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        typeAnimated: true,
        buttons: {
            ok: function () {
                location.href = "";
            }
        }
    });
}
function correctoAlertaLocation(loc) {
    $.confirm({
        title: 'Correcto',
        content: 'Operación realizada con éxito.',
        icon: 'fa fa-check',
        type: 'green',
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        typeAnimated: true,
        buttons: {
            ok: function () {
                location.href = loc;
            }
        }
    });
}
function errorAlerta() {
    $.alert({
        title: "Error",
        icon: "fa fa-minus-circle",
        content: "Algo salió mal, intente de nuevo.",
        type: "red",
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false
    });
}
function alertaPersonalizada(title, icon, content, type) {
    $.alert({
        title: title, icon: icon, content: content, type: type, animation: 'scale', closeAnimation: 'scale', animateFromElement: false, typeAnimated: true
    });
}
function alertaEliminar(titleConfirm, contentConfirm, id, url, tablas) {
    $.confirm({
        title: titleConfirm,
        content: contentConfirm,
        icon: 'fa fa-question',
        type: 'red',
        animation: 'scale',
        closeAnimation: 'scale',
        animateFromElement: false,
        typeAnimated: true,
        buttons: {
            no: function () {
            },
            si: {
                text: 'Si',
                btnClass: 'btn-red',
                action: function () {
                    $.ajax({
                        url: url, type: "POST", data: "id=" + id,
                        beforeSend: function () {
                        },
                        success: function (resp) {
                            if (resp === "ERROR") {
                                errorAlerta();
                            } else if (resp === "CORRECTO") {
                                correctoAlerta();
                            } else {
                                alert(resp);
                            }
                        },
                        error: function () {
                            console.log("Problemas con la petición.");
                        },
                        complete: function () {
                        }
                    });
                }
            }
        }
    });
}
$(".campoNumero").keypress(function (e) {
    if (isNaN(this.value + String.fromCharCode(e.charCode))) {
        return false;
    }
}).on("cut copy paste", function (e) {
    e.preventDefault();
});