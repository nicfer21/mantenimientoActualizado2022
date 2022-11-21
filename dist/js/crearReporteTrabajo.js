$(document).ready(function () {

    var idorden = $("#idorden");

    var horainic = "";
    var fechainic = "";
    var horafin = "";
    var fechafin = "";

    var dataid = $("#dataid");
    var datatitulo = $("#datatitulo");
    var datadni = $("#datadni");
    var datanombre = $("#datanombre");
    var dataocupacion = $("#dataocupacion");
    var datainicio = $("#datainicio");
    var datafinal = $("#datafinal");

    var requerimiento = $("#requerimiento");

    var idImprimir = $("#idImprimir");
    var nombreImprimir = $("#nombreImprimir");


    var btnAgragarFila = $("#btnAgragarFila");
    var btnEliminarFila = $("#btnEliminarFila");
    var btnModalAgregarFila = $("#btnModalAgregarFila");

    var selecionBuscarElemento = $("#selecionBuscarElemento");

    var idBuscarElemento = $("#idBuscarElemento");
    var nombreBuscarElemento = $("#nombreBuscarElemento");
    var categoriaBuscarElemento = $("#categoriaBuscarElemento");
    var tipoBuscarElemento = $("#tipoBuscarElemento");
    var unidadBuscarElemento = $("#unidadBuscarElemento");
    var costoBuscarElemento = $("#costoBuscarElemento");

    var usarBuscarElemento = $("#usarBuscarElemento");



    var btnBuscarOrden = $("#btnBuscarOrden");
    var btnInfo = $("#btnInfo");
    var btnCalcularHora = $("#btnCalcularHora");
    var btnGuardar = $("#btnGuardar");

    var tiempoTrabajo = $("#tiempoTrabajo");
    var descripcion = $("#descripcion").summernote();

    $(".select2").select2();

    var fechaInicio = $('#fechaInicio').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: "fa fa-clock",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });
    var fechaFinal = $('#fechaFinal').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: "fa fa-clock",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });



    $(btnInfo).attr('disabled', true);

    $(idorden).change(function (e) {
        e.preventDefault();
        $(btnInfo).attr('disabled', true);

        $(dataid).val("");
        $(datatitulo).val("");
        $(datadni).val("");
        $(datanombre).val("");
        $(dataocupacion).val("");

    });

    $("#fechaInicio").on("change.datetimepicker", function (e) {
        fechainic = moment(e.date).format('YYYY-MM-DD');
        horainic = moment(e.date).format('HH:mm');
    });

    $("#fechaFinal").on("change.datetimepicker", function (e) {
        horafin = moment(e.date).format('HH:mm');
        fechafin = moment(e.date).format('YYYY-MM-DD');
    });

    $(btnBuscarOrden).click(function (e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: "accion/buscarRepOrden.php",
            data: {
                id: idorden.val()
            },
            success: function (response) {

                var data = jQuery.parseJSON(response);

                $(dataid).val(data[0].id);
                $(datatitulo).val(data[0].titulo);
                $(datadni).val(data[0].dni);
                $(datanombre).val(data[0].nombre);
                $(dataocupacion).val(data[0].ocupacion);

                $(btnInfo).attr('disabled', false);
            }
        });

        $.ajax({
            type: "post",
            url: "accion/buscarRepRequerimiento.php",
            data: {
                id: idorden.val()
            },
            success: function (response) {

                $(requerimiento).empty();

                var data = jQuery.parseJSON(response);

                var longitud = Object.keys(data).length;

                if (longitud > 0) {
                    for (let index = 0; index < longitud; index++) {
                        
                        agregarF(data[index].id,data[index].nombre,data[index].costou,data[index].tipo,data[index].categoria,data[index].cantidad,data[index].costost);
                        
                    }
                }

            }
        });




    });

    $(btnInfo).click(function (e) {
        e.preventDefault();

        $(idImprimir).val($(dataid).val());
        $(nombreImprimir).val($(datatitulo).val());

        $("#modalImprimir").modal("show");

    });

    $(btnCalcularHora).click(function (e) {
        e.preventDefault();

        if (fechainic == "" || fechainic == "" || horainic == "" || horafin == "") {
            error("Rellene las fechas de inicio y fin del trabajo");
        } else if (fechafin == fechainic) {
            var array1 = horainic.split(':');
            var array2 = horafin.split(':');

            var hora1 = parseInt(array1[0]);
            var minuto1 = parseInt(array1[1]);
            var tiempo1 = (hora1 * 60) + minuto1;

            var hora2 = parseInt(array2[0]);
            var minuto2 = parseInt(array2[1]);
            var tiempo2 = (hora2 * 60) + minuto2;

            if (tiempo2 > tiempo1) {
                $(tiempoTrabajo).val(tiempo2 - tiempo1);
                $(datainicio).val(fechainic + " " + horainic);
                $(datafinal).val(fechafin + " " + horafin);
            } else {
                error("El horario final es menor al inicial");
            }

        } else {
            error("Las fechas no coinciden");
        }

    });

    $(selecionBuscarElemento).change(function (e) {

        $("#selecionBuscarElemento option[value='o']").remove();
        btnModalAgregarFila.prop("disabled", false);

        var idItem = selecionBuscarElemento.val();

        $.ajax({
            type: "post",
            url: "accion/buscarProcInventario.php",
            data: {
                id: idItem
            },
            success: function (response) {
                var data = jQuery.parseJSON(response);

                $(idBuscarElemento).val(data[0].id);
                $(nombreBuscarElemento).val(data[0].nombre);
                $(categoriaBuscarElemento).val(data[0].categoria);
                $(tipoBuscarElemento).val(data[0].tipo);
                $(unidadBuscarElemento).val(data[0].unidad);
                $(costoBuscarElemento).val(data[0].costo);

            },
        });

    });

    $(btnAgragarFila).click(function (e) {

        if ($(tiempoTrabajo).val() == "") {
            error("Tiene que seleccionar anteriormente la fecha y horario inicial y final");
        } else {
            $("#modalCrear").modal("show");
            limpiarModal();
        }

    });

    $(btnEliminarFila).click(function (e) {
        $('div.listaEleccion').each(function (index, item) {
            jQuery(':checkbox', this).each(function () {
                if ($(this).is(':checked')) {
                    $(item).remove();
                }
            });
        });
    });

    $(btnModalAgregarFila).click(function (e) {

        var id = $(idBuscarElemento).val();
        var nombre = $(nombreBuscarElemento).val();
        var costo = $(costoBuscarElemento).val();
        var categoria = $(categoriaBuscarElemento).val();
        var tipo = $(tipoBuscarElemento).val();
        var cantidad = $(usarBuscarElemento).val();

        if (cantidad == "") {
            error("Seleccionar una cantidad");
        } else {
            if (tipo == "USO X HORA") {
                var costoTotal = cantidad * costo * (parseInt($(tiempoTrabajo).val()) / 60) * 100;
                costoTotal = Math.round(costoTotal) / 100;
            } else {
                var costoTotal = cantidad * costo;
            }

            agregarF(id, nombre, costo, categoria, tipo, cantidad, costoTotal);

            $("#modalCrear").modal("hide");
        }

    });



    $(btnGuardar).click(function (e) {
        e.preventDefault();

        if ($(descripcion).val() == "") {
            error("No dejar vacio las obaservaciones");
        }

    });

    function agregarF(id, nombre, costo, categoria, tipo, cantidad, costototal) {
        var fila = "";
        fila = fila + "<div class='listaEleccion float-clear'>";
        fila = fila + "<ul class='list-group'>";
        fila = fila + "<li class='list-group-item'>";
        fila = fila + "<div class='float-left'><input type='checkbox' class='m-1' name='item_index[]' /></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + id + "' name='idReq[]' style='width:60px'></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + nombre + "' name='nombreReq[]' style='width:350px'></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + costo + "' name='costoReq[]' style='width:60px'></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + categoria + "' name='categoriaReq[]' style='width:100px'></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + tipo + "' name='tipoReq[]' style='width:130px'></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + cantidad + "' name='cantidadReq[]' style='width:100px'></div>";
        fila = fila + "<div class='float-left'><input class='form-control m-1' readonly type='text' value = '" + costototal + "' name='costoTotalReq[]' style='width:60px'></div>";
        fila = fila + "</li >";
        fila = fila + "</ul >";
        fila = fila + " </div >";

        $("#requerimiento").append(fila);

    }
    function limpiarModal() {
        $(usarBuscarElemento).val("");
    }
    function guardar() {
        Swal.fire({
            icon: 'success',
            title: 'Se guardo con exito',
            showConfirmButton: false,
            timer: 1000
        })
    }
    function error(texto) {
        Swal.fire({
            icon: 'error',
            title: 'Ocurrio un Error',
            text: texto,
            timer: 2000
        })
    }

});