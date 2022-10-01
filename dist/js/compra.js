$(document).ready(function () {

    var elementoCompra = $("#elementoCompra");
    var cantidadCompra = $("#cantidadCompra");

    var btnAgregar = $("#btnAgregar");

    $('.select2').select2();

    var tablaCompra = $("#tablaCompra").DataTable({

        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,

        ajax: 'accion/mostrarCompra.php',
        columns: [
            { data: 0 },
            { data: 1 },
            { data: 2 },
            { data: 3 },
            { data: 4 }
        ],
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

        select: true
    });

    btnAgregar.click(function (e) {
        var i = 0;

        if (elementoCompra.val() == "p") {
            $(elementoCompra).addClass("is-invalid");
            $(elementoCompra).removeClass("is-valid");
        } else {
            $(elementoCompra).addClass("is-valid");
            $(elementoCompra).removeClass("is-invalid");
            i++;
        }

        if (cantidadCompra.val() == "") {
            $(cantidadCompra).addClass("is-invalid");
            $(cantidadCompra).removeClass("is-valid");
            $(cantidadCompra).removeClass("is-warning");
        } else {
            if (!isNaN(cantidadCompra.val())) {
                $(cantidadCompra).addClass("is-valid");
                $(cantidadCompra).removeClass("is-invalid");
                $(cantidadCompra).removeClass("is-warning");
                i++;
            } else {
                $(cantidadCompra).addClass("is-warning");
                $(cantidadCompra).removeClass("is-valid");
                $(cantidadCompra).removeClass("is-invalid");
            }
        }

        if (i == 2) {

            Swal.fire({
                title: '¿Estás seguro de guardar?',
                text: "No podra ser restaurado",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Confirmar!!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "post",
                        url: "accion/guardarCompra.php",
                        data: {
                            id: elementoCompra.val(),
                            cantidad: cantidadCompra.val()
                        },
                        success: function (response) {
                            if (response == 1) {
                                guardar();
                                tablaCompra.ajax.reload();
                                limpiar();
                            }else{
                                error();
                                tablaCompra.ajax.reload();
                                limpiar();
                            }
                        }
                    });
                }
            })

        } else {
            error()
        }
    });

    function limpiar(params) {
        $('#elementoCompra option[value="p"]').prop('selected', true);
        $(cantidadCompra).removeClass("is-valid");
        cantidadCompra.val("");
    }
    function guardar() {
        Swal.fire({
            icon: 'success',
            title: 'Se guardo con exito',
            showConfirmButton: false,
            timer: 1000
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