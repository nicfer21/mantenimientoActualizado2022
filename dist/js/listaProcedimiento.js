$(document).ready(function () {

    var dataReq = $("#dataReq");
    var idBuscarReq = $("#idBuscarReq");
    var nombreBuscarReq = $("#nombreBuscarReq");

    var idEliminar = $("#idEliminar");
    var nombreEliminar = $("#nombreEliminar");

    var idImprimir = $("#idImprimir");
    var nombreImprimir = $("#nombreImprimir");

    var modalImprimir = $("#modalImprimir");
    var modalEliminar = $("#modalEliminar");

    var btnEliminar = $("#btnEliminar");

    var tablaProcedimiento = $("#tablaProcedimiento").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        select: true
    });

    $('#tablaProcedimiento tbody').on('contextmenu', 'tr', function (e) {

        e.preventDefault();

        var data = tablaProcedimiento.row(this).data();

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
                    url: "accion/eliminarProcedimiento.php",
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

    $(".btnBuscarProc").click(function (e) {

        let id = $(this).parents("tr").find(".id").html();
        let nombre = $(this).parents("tr").find(".nombre").html();

        $(idBuscarReq).val(id);
        $(nombreBuscarReq).val(nombre);

        $.ajax({
            type: "post",
            url: "accion/buscarRequerimiento.php",
            data: {
                id: id
            },
            success: function (response) {

                dataReq.empty();

                $(dataReq).append(response);

            }
        });

        $("#modalBuscarReq").modal("show");

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