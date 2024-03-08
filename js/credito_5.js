$(document).ready(function () {
    $('#datosAlumno').hide();
    getDataTable("tblData");
});
function getDataTable(tabla) {
    var table = $("#" + tabla).DataTable({
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "No hay certificaciones realizadas",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        responsive: true
    });
}
$('#frmCreate').on('submit', function () {
    $.ajax({
        url: "procesos/proceso_credito_5.php?opt=1", 
        type: "POST", 
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function () {
        },
        success: function (resp) {
            if (resp === "CORRECTO") {
                correctoAlertaLocation("credito_5.php");
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
    
    return false;
});
$('#frmUpdate').on('submit', function () {
    var data = $(this).serialize();
    accionesConArchivo("procesos/proceso_certificaciones.php?opt=2", data,"certificaciones.php");
    return false;
});