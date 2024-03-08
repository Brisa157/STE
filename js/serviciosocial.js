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
            "sEmptyTable": "No hay servicios sociales realizados",
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
    var data = $(this).serialize();
    acciones("procesos/proceso_serviciosocial.php?opt=1", data,"serviciosocial.php");
    return false;
});
$('#frmUpdate').on('submit', function () {
    var data = $(this).serialize();
    acciones("procesos/proceso_serviciosocial.php?opt=2", data,"serviciosocial.php");
    return false;
});