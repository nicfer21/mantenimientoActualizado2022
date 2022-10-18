$(document).ready(function () {

    var idmaq = $("#idmaq");
    var idparte = $("#idparte");
    var idsubparte = $("#idsubparte");
    var idprocedimiento = $("#idprocedimiento");

    var btnBuscarProcedimiento = $("#btnBuscarProcedimiento");

    var dataReq = $("#dataReq");

    var dataid = $("#dataid");
    var datanombre = $("#datanombre");
    var dataidmaquina = $("#dataidmaquina");
    var datamaquina = $("#datamaquina");
    var dataidparte = $("#dataidparte");
    var dataparte = $("#dataparte");
    var dataidsubparte = $("#dataidsubparte");
    var datasubparte = $("#datasubparte");
    var dataestrategia = $("#dataestrategia");
    var dataduracion = $("#dataduracion");
    var datadni = $("#datadni");
    var datatrabajador = $("#datatrabajador");
    var dataprofesion = $("#dataprofesion");
    var datalugar = $("#datalugar");
    var datainstruccion = $("#datainstruccion");
    var dataley = $("#dataley");

    var fechaInicial = $("#fechaInicial");
    var fechaFinal = $("#fechaFinal");

    var trabajador = $("#trabajador");
    var prioridad = $("#prioridad");
    var descripcion = $('#descripcion').summernote();
    var btnGuardar = $("#btnGuardar");

    idparte.prop("disabled", true);
    idsubparte.prop("disabled", true);
    idprocedimiento.prop("disabled", true);

    $('#calcularFecha').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: "fa fa-clock",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down"
        }
    });

    $('#calcularFecha').on("change.datetimepicker", function (e) {
        var fecha = moment(e.date).format('YYYY-MM-DD');
        var horas = moment(e.date).format('HH:mm');
        var arrayH = horas.split(':');

        var hora = parseInt(arrayH[0]);
        var minuto = parseInt(arrayH[1]);

        var duracion = parseInt($(dataduracion).val());

        var sumaH = parseInt(minuto) + parseInt(duracion);

        var horaS = Math.trunc(sumaH / 60);
        var minutoS = sumaH - (horaS * 60);

        hora = hora + horaS;
        minuto = minutoS;

        if (hora <= 9) {
            hora = "0" + hora;
        }

        if (minuto <= 9) {
            minuto = "0" + minuto;
        }

        var fechac = fecha + " " + hora + ":" + minuto;


        $(fechaInicial).val(moment(e.date).format('YYYY-MM-DD HH:mm'));
        $(fechaFinal).val(fechac);

    });



    $(idmaq).change(function (e) {

        $("#idmaq option[value='o']").remove();

        idparte.prop("disabled", false);

        $(idparte).empty();

        var maquina = $(idmaq).val();

        $.ajax({
            type: "post",
            url: "accion/buscarParte.php",
            data: {
                maquina: maquina,
            },
            success: function (response) {
                var data = jQuery.parseJSON(response);
                var largo = data.length;

                for (let i = 0; i < largo; i++) {
                    $(idparte).append(
                        "<option value='" + data[i].id + "' >" + data[i].parte + "</option>"
                    );
                }
            },
        });

        $(idsubparte).empty();

        $(idsubparte).append(
            "<option value='o' >Seleccione ...</option>"
        );

        idsubparte.prop("disabled", true);


        $(idprocedimiento).empty();

        $(idprocedimiento).append(
            "<option value='o' >Seleccione ...</option>"
        );

        idprocedimiento.prop("disabled", true);
    });

    $(idparte).change(function (e) {

        idsubparte.prop("disabled", false);

        $(idsubparte).empty();

        var parte = $(idparte).val();

        $.ajax({
            type: "post",
            url: "accion/buscarSubparte.php",
            data: {
                parte: parte,
            },
            success: function (response) {
                var data = jQuery.parseJSON(response);
                var largo = data.length;

                for (let i = 0; i < largo; i++) {
                    $(idsubparte).append(
                        "<option value='" +
                        data[i].id +
                        "' >" +
                        data[i].subparte +
                        "</option>"
                    );
                }
            },
        });

        $(idprocedimiento).empty();

        $(idprocedimiento).append(
            "<option value='o' >Seleccione ...</option>"
        );

        idprocedimiento.prop("disabled", true);

    });

    $(idsubparte).change(function (e) {

        idprocedimiento.prop("disabled", false);

        $(idprocedimiento).empty();

        var subparte = $(idsubparte).val();

        $.ajax({
            type: "post",
            url: "accion/buscarProcedimiento.php",
            data: {
                subparte: subparte,
            },
            success: function (response) {
                var data = jQuery.parseJSON(response);
                var largo = data.length;

                for (let i = 0; i < largo; i++) {
                    $(idprocedimiento).append(
                        "<option value='" +
                        data[i].id +
                        "' >" +
                        data[i].procedimiento +
                        "</option>"
                    );
                }
            },
        });

    });

    $(btnBuscarProcedimiento).click(function (e) {

        if (idprocedimiento.val() != "o") {

            //Poner datos

            $.ajax({
                type: "post",
                url: "accion/buscarProcDatos.php",
                data: {
                    id: idprocedimiento.val()
                },
                success: function (response) {

                    var data = jQuery.parseJSON(response);

                    $(dataid).val(data[0].id);
                    $(datanombre).val(data[0].nombre);
                    $(dataidmaquina).val(data[0].idmaquina);
                    $(datamaquina).val(data[0].maquina);
                    $(dataidparte).val(data[0].idparte);
                    $(dataparte).val(data[0].parte);
                    $(dataidsubparte).val(data[0].idsubparte);
                    $(datasubparte).val(data[0].subparte);
                    $(dataestrategia).val(data[0].estrategia);
                    $(dataduracion).val(data[0].duracion);
                    $(datadni).val(data[0].dni);
                    $(datatrabajador).val(data[0].trabajador);
                    $(dataprofesion).val(data[0].profesion);
                    $(datalugar).val(data[0].lugar);
                    $(datainstruccion).val(data[0].instruccion);
                    $(dataley).val(data[0].ley);

                }
            });


            // Poner requerimientos

            $.ajax({
                type: "post",
                url: "accion/buscarReqDatos.php",
                data: {
                    id: idprocedimiento.val()
                },
                success: function (response) {

                    dataReq.empty();

                    $(dataReq).append(response);

                }
            });

        } else {
            error("Escoja un procedimiento");
        }



    });

    $(btnGuardar).click(function (e) {
        var k = 0;

        if (idmaq.val() == "o") {
            $(idmaq).addClass("is-invalid");
            $(idmaq).removeClass("is-valid");
        } else {
            $(idmaq).addClass("is-valid");
            $(idmaq).removeClass("is-invalid");
            k++;
        }
        if (idparte.val() == "o") {
            $(idparte).addClass("is-invalid");
            $(idparte).removeClass("is-valid");
        } else {
            $(idparte).addClass("is-valid");
            $(idparte).removeClass("is-invalid");
            k++;
        }
        if (idsubparte.val() == "o") {
            $(idsubparte).addClass("is-invalid");
            $(idsubparte).removeClass("is-valid");
        } else {
            $(idsubparte).addClass("is-valid");
            $(idsubparte).removeClass("is-invalid");
            k++;
        }
        if (idprocedimiento.val() == "o") {
            $(idprocedimiento).addClass("is-invalid");
            $(idprocedimiento).removeClass("is-valid");
        } else {
            $(idprocedimiento).addClass("is-valid");
            $(idprocedimiento).removeClass("is-invalid");
            k++;
        }

        if (dataid.val() == "") {
            $(dataid).addClass("is-invalid");
            $(dataid).removeClass("is-valid");
        } else {
            $(dataid).addClass("is-valid");
            $(dataid).removeClass("is-invalid");
            k++;
        }

        if (fechaInicial.val() == "") {
            $(fechaInicial).addClass("is-invalid");
            $(fechaInicial).removeClass("is-valid");
        } else {
            $(fechaInicial).addClass("is-valid");
            $(fechaInicial).removeClass("is-invalid");
            k++;
        } if (fechaFinal.val() == "") {
            $(fechaFinal).addClass("is-invalid");
            $(fechaFinal).removeClass("is-valid");
        } else {
            $(fechaFinal).addClass("is-valid");
            $(fechaFinal).removeClass("is-invalid");
            k++;
        }

        if (k == 7) {
            $("#formGuardar").submit();
        } else {
            error("Verifique que todas las casillas este rellenas");
        }

    });

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
    function error(texto) {
        Swal.fire({
            icon: 'error',
            title: 'Ocurrio un Error',
            text: texto,
            timer: 2000
        })
    }


});