$(document).ready(function () { 

    $("#tablaOrdenAbierta").DataTable({
        "responsive": true,
        "autoWidth": true,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    $("#tablaOrdenEnProceso").DataTable({
        "responsive": true,
        "autoWidth": true,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    $("#tablaOrdenCerrada").DataTable({
        "responsive": true,
        "autoWidth": true,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

});