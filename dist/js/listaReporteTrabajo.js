$(document).ready(function () {

    var idImprimir = $("#idImprimir");
    var nombreImprimir = $("#nombreImprimir");

    var modalImprimir = $("#modalImprimir");

    var tablaReporte = $("#tablaReporte").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        select: true
    });

    $('#tablaReporte tbody').on('contextmenu', 'tr', function (e) {

        e.preventDefault();

        var data = tablaReporte.row(this).data();

        Swal.fire({
            title: 'Configuraciones adicionales',
            showCancelButton: true,
            confirmButtonText: 'Imprimir',
        }).then((result) => {

            if (result.isConfirmed) {

                $(idImprimir).val(data[0]);
                $(nombreImprimir).val(data[1]);

                $(modalImprimir).modal("show");

            }

        });


    });



});