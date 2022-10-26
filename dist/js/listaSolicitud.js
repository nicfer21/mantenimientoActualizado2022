$(document).ready(function () { 

    $("#tablaSolicitudes").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_trabajador_wrapper .col-md-6:eq(0)');

    $("#tablaSolicitudesLeidas").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_trabajador_wrapper .col-md-6:eq(0)');

});