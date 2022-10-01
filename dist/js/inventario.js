$(document).ready(function () {

    var tablaInventario = $("#tablaInventario").DataTable({

        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,

        ajax: 'accion/mostrarInventario.php',
        columns: [
            { data: 0 },
            { data: 1 },
            { data: 2 },
            { data: 3 },
            { data: 4 },
            { data: 5 },
            { data: 6 },
            { data: 7 }
        ],
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

        select: true
    });

    var modalCrear = $("#modalCrear");

    var btnTrabajadorCrear = $("#btnTrabajadorCrear");
    var btnCrearInventario = $("#btnCrearInventario");

    var nombreInventario = $("#nombreInventario");
    var cantidadInventario = $("#cantidadInventario");
    var costoInventario = $("#costoInventario");
    var fabricanteInventario = $("#fabricanteInventario");
    var proveedorInventario = $("#proveedorInventario");
    var categoriaInventario = $("#categoriaInventario");
    var tipoInventario = $("#tipoInventario");

    var idActInventario = $("#idActInventario");
    var nombreActInventario = $("#nombreActInventario");
    var cantidadActInventario = $("#cantidadActInventario");
    var costoActInventario = $("#costoActInventario");
    var fabricanteActInventario = $("#fabricanteActInventario");
    var proveedorActInventario = $("#proveedorActInventario");
    var categoriaActInventario = $("#categoriaActInventario");
    var tipoActInventario = $("#tipoActInventario");

    var switchActualizar = $("#switchActualizar");

    btnCrearInventario.click(function (e) {
        limpiarModal();
    });

    btnTrabajadorCrear.click(function (e) {
        var i = 0;

        if (nombreInventario.val() == "") {
            $(nombreInventario).addClass("is-invalid");
            $(nombreInventario).removeClass("is-valid");
        } else {
            $(nombreInventario).addClass("is-valid");
            $(nombreInventario).removeClass("is-invalid");
            i++;
        }

        if (costoInventario.val() == "") {
            $(costoInventario).addClass("is-invalid");
            $(costoInventario).removeClass("is-valid");
            $(costoInventario).removeClass("is-warning");
        } else {
            if (!isNaN(costoInventario.val())) {
                $(costoInventario).addClass("is-valid");
                $(costoInventario).removeClass("is-invalid");
                $(costoInventario).removeClass("is-warning");
                i++;
            } else {
                $(costoInventario).addClass("is-warning");
                $(costoInventario).removeClass("is-valid");
                $(costoInventario).removeClass("is-invalid");
            }
        }

        if (cantidadInventario.val() == "") {
            $(cantidadInventario).addClass("is-invalid");
            $(cantidadInventario).removeClass("is-valid");
            $(cantidadInventario).removeClass("is-warning");
        } else {
            if (!isNaN(cantidadInventario.val())) {
                $(cantidadInventario).addClass("is-valid");
                $(cantidadInventario).removeClass("is-invalid");
                $(cantidadInventario).removeClass("is-warning");
                i++;
            } else {
                $(cantidadInventario).addClass("is-warning");
                $(cantidadInventario).removeClass("is-valid");
                $(cantidadInventario).removeClass("is-invalid");
            }
        }

        if (i == 3) {
            $.ajax({
                type: "post",
                url: "accion/guardarInventario.php",
                data: {
                    nombre: nombreInventario.val(),
                    costou: costoInventario.val(),
                    cantidad: cantidadInventario.val(),
                    tipo: tipoInventario.val(),
                    fabricante: fabricanteInventario.val(),
                    proveedor: proveedorInventario.val(),
                    categoria: categoriaInventario.val()
                },
                success: function (response) {
                    if (response == 1) {
                        limpiarModal();
                        modalCrear.modal('hide');
                        guardar();
                        tablaInventario.ajax.reload();
                    } else {
                        tablaInventario.ajax.reload();
                    }
                }
            });

        }
    });

    $('#tablaInventario tbody').on('click', 'tr', function () {

        var data = tablaInventario.row(this).data();

        if (switchActualizar.is(":checked")) {



            idActInventario.val(data[0]);
            nombreActInventario.val(data[1]);
            costoActInventario.val(data[2]);
            cantidadActInventario.val(data[3]);
            $("#tipoActInventario option[value='" + data[4] + "']").attr("selected", true);

            setTimeout(function () {
                $("#modalActualizar").modal("show");
            }, 1000);
        }

    });

    function limpiarModal() {
        nombreInventario.val("");
        cantidadInventario.val("");
        costoInventario.val("");
        nombreInventario.removeClass("is-valid");
        nombreInventario.removeClass("is-invalid");
        costoInventario.removeClass("is-valid");
        costoInventario.removeClass("is-warning");
        costoInventario.removeClass("is-invalid");
        cantidadInventario.removeClass("is-valid");
        cantidadInventario.removeClass("is-warning");
        cantidadInventario.removeClass("is-invalid");
    }
    function guardar() {
        Swal.fire({
            icon: 'success',
            title: 'Se guardo con exito',
            showConfirmButton: false,
            timer: 1000
        })

    }
    function actualizar() {
        Swal.fire({
            icon: 'success',
            title: 'Se Actualizo con exito',
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
