$(document).ready(function () {

    var tablaOrdenAbierta = $("#tablaOrdenAbierta").DataTable({
        "responsive": true,
        "autoWidth": true,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    var tablaOrdenCerrada = $("#tablaOrdenCerrada").DataTable({
        "responsive": true,
        "autoWidth": true,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });

    $('#tablaOrdenAbierta tbody').on('contextmenu', 'tr', function (e) {

        e.preventDefault();

        var data = tablaOrdenAbierta.row(this).data();

        Swal.fire({
            title: 'Configuraciones adicionales',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Imprimir',
            denyButtonText: `Eliminar`,
        }).then((result) => {

            if (result.isConfirmed) {

                $(idImprimir).val(data[0]);
                $(nombreImprimir).val(data[1]);

                $(modalImprimir).modal("show");

            } else if (result.isDenied) {

                $(idEliminar).val(data[0]);
                $(nombreEliminar).val(data[1]);

                $(modalEliminar).modal("show");

            }
        });


    });

    $('#tablaOrdenCerrada tbody').on('contextmenu', 'tr', function (e) {

        e.preventDefault();

        var data = tablaOrdenCerrada.row(this).data();

        Swal.fire({
            title: 'Configuraciones adicionales',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Imprimir',
            denyButtonText: `Eliminar`,
        }).then((result) => {

            if (result.isConfirmed) {

                $(idImprimir).val(data[0]);
                $(nombreImprimir).val(data[1]);

                $(modalImprimir).modal("show");

            } else if (result.isDenied) {

                $(idEliminar).val(data[0]);
                $(nombreEliminar).val(data[1]);

                $(modalEliminar).modal("show");

            }
        });


    });


    $(btnEliminar).click(function (e) {

        Swal.fire({
            title: '¿Esta seguro de eliminar?',
            text: 'Si elimina tendra efectos sobre otros datos',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Eliminar'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "accion/eliminarOrden.php",
                    data: {
                        id: $(idEliminar).val()
                    },
                    success: function (response) {
                        if (response == 1) {

                            eliminar();

                            $(modalEliminar).modal("hide");

                            location.reload();

                        } else {
                            error();
                            location.reload();
                        }
                    }
                });
            } else {
                Swal.fire('No hubo cambios', '', 'info')
            }
        })

    });

    function eliminar() {
        Swal.fire({
            icon: 'success',
            title: 'Se Elimino exitosamente',
            showConfirmButton: false,
            timer: 2000
        })
    }

    function error() {
        Swal.fire({
            icon: 'error',
            title: 'Ocurrio un Error',
            text: 'Verifica que todo este completo y en orden',
            timer: 2000
        })

    }
});