$(document).ready(function () {

    var modalCrear = $("#modalCrear");
    var modalActualizar = $("#modalActualizar");
    var modalEliminar = $("#modalEliminar");

    var btnTrabajadorCrear = $("#btnTrabajadorCrear");
    var btnCrearInventario = $("#btnCrearInventario");
    var btnActualizar = $("#btnActualizar");
    var btnEliminar = $("#btnEliminar");

    var nombreInventario = $("#nombreInventario");
    var cantidadInventario = $("#cantidadInventario");
    var costoInventario = $("#costoInventario");
    var unidadInventario = $("#unidadInventario");
    var fabricanteInventario = $("#fabricanteInventario");
    var proveedorInventario = $("#proveedorInventario");
    var categoriaInventario = $("#categoriaInventario");
    var tipoInventario = $("#tipoInventario");

    var idInventarioAct = $("#idInventarioAct");
    var nombreInventarioAct = $("#nombreInventarioAct");
    var cantidadInventarioAct = $("#cantidadInventarioAct");
    var costoInventarioAct = $("#costoInventarioAct");
    var unidadInventarioAct = $("#unidadInventarioAct");
    var fabricanteInventarioAct = $("#fabricanteInventarioAct");
    var proveedorInventarioAct = $("#proveedorInventarioAct");
    var categoriaInventarioAct = $("#categoriaInventarioAct");
    var tipoInventarioAct = $("#tipoInventarioAct");

    var idInventarioEli = $("#idInventarioEli");
    var nombreInventarioEli = $("#nombreInventarioEli");

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
            { data: 7 },
            { data: 8 }
        ],
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

        select: true
    });

    $('#tablaInventario tbody').on('contextmenu', 'tr', function (e) {

        e.preventDefault();

        var data = tablaInventario.row(this).data();

        Swal.fire({
            title: 'Configuraciones adicionales',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Actualizar',
            denyButtonText: `Eliminar`,
        }).then((result) => {

            if (result.isConfirmed) {

                $(idInventarioAct).val(data[0]);
                $(nombreInventarioAct).val(data[1]);
                $(costoInventarioAct).val(data[2]);
                $(cantidadInventarioAct).val(data[3]);

                $(modalActualizar).modal("show");

            } else if (result.isDenied) {

                $(idInventarioEli).val(data[0]);
                $(nombreInventarioEli).val(data[1]);

                $(modalEliminar).modal("show");

            }
        });

        
    });

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
                    unidad: unidadInventario.val(),
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

    $(btnActualizar).click(function (e) {
        e.preventDefault();

        var i = 0;

        if (nombreInventarioAct.val() == "") {
            $(nombreInventarioAct).addClass("is-invalid");
            $(nombreInventarioAct).removeClass("is-valid");
        } else {
            $(nombreInventarioAct).addClass("is-valid");
            $(nombreInventarioAct).removeClass("is-invalid");
            i++;
        }

        if (costoInventarioAct.val() == "") {
            $(costoInventarioAct).addClass("is-invalid");
            $(costoInventarioAct).removeClass("is-valid");
            $(costoInventarioAct).removeClass("is-warning");
        } else {
            if (!isNaN(costoInventarioAct.val())) {
                $(costoInventarioAct).addClass("is-valid");
                $(costoInventarioAct).removeClass("is-invalid");
                $(costoInventarioAct).removeClass("is-warning");
                i++;
            } else {
                $(costoInventarioAct).addClass("is-warning");
                $(costoInventarioAct).removeClass("is-valid");
                $(costoInventarioAct).removeClass("is-invalid");
            }
        }

        if (cantidadInventarioAct.val() == "") {
            $(cantidadInventarioAct).addClass("is-invalid");
            $(cantidadInventarioAct).removeClass("is-valid");
            $(cantidadInventarioAct).removeClass("is-warning");
        } else {
            if (!isNaN(cantidadInventarioAct.val())) {
                $(cantidadInventarioAct).addClass("is-valid");
                $(cantidadInventarioAct).removeClass("is-invalid");
                $(cantidadInventarioAct).removeClass("is-warning");
                i++;
            } else {
                $(cantidadInventarioAct).addClass("is-warning");
                $(cantidadInventarioAct).removeClass("is-valid");
                $(cantidadInventarioAct).removeClass("is-invalid");
            }
        }

        if (i == 3) {

            Swal.fire({
                title: '¿Esta seguro de Actualizar?',
                text: 'Si actualiza tendra efectos sobre otros datos',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Actualizar'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "accion/actualizarInventario.php",
                        data: {
                            id: idInventarioAct.val(),
                            nombre: nombreInventarioAct.val(),
                            costou: costoInventarioAct.val(),
                            cantidad: cantidadInventarioAct.val(),
                            unidad: unidadInventarioAct.val(),
                            tipo: tipoInventarioAct.val(),
                            fabricante: fabricanteInventarioAct.val(),
                            proveedor: proveedorInventarioAct.val(),
                            categoria: categoriaInventarioAct.val()
                        },
                        success: function (response) {
                            if (response == 1) {
                                modalActualizar.modal('hide');
                                actualizar();
                                tablaInventario.ajax.reload();
                            } else {
                                tablaInventario.ajax.reload();
                            }
                        }
                    });
                } else {
                    Swal.fire('No hubo cambios', '', 'info')
                }
            })

        } else {
            error();
        }

    });

    $(btnEliminar).click(function (e) {
        e.preventDefault();

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
                    url: "accion/eliminarInventario.php",
                    data: {
                        id: $(idInventarioEli).val()
                    },
                    success: function (response) {
                        if (response == 1) {

                            eliminar();

                            $(modalEliminar).modal("hide");
                            tablaInventario.ajax.reload();
                        } else {
                            error();
                            tablaInventario.ajax.reload();
                        }
                    }
                });
            } else {
                Swal.fire('No hubo cambios', '', 'info')
            }
        })

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
            timer: 2000
        })

    }
    function actualizar() {
        Swal.fire({
            icon: 'success',
            title: 'Se Actualizo con exito',
            showConfirmButton: false,
            timer: 2000
        })
    }
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
