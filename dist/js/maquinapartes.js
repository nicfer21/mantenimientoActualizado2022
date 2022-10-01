$(document).ready(function() {

    $("#btnBuscar").click(function(e) {

        var id = $("#cbxBuscar").val();

        // invocacion de las maquinas
        mostrarMaquinas(id);

        // invocacion de las partes
        mostrarPartes(id);

        // invocacion de las subpartes
        mostrarSubpartes(id);

    });

    function mostrarMaquinas(id) {
        // ajax para las maquinas
        $.ajax({
            type: "post",
            url: "accion/buscarMaquinaMaquina.php",
            data: {
                id: id
            },
            success: function(response) {
                var data = jQuery.parseJSON(response);
                var largo = data.length;

                $("#tablaMaquinasInfo").empty();

                for (let i = 0; i < largo; i++) {
                    $("#tablaMaquinasInfo").append(
                        "<tr data-widget='expandable-table' aria-expanded='true'>" +
                        "<td >" + data[i].id + "</td>" +
                        "<td >" + data[i].marca + "</td>" +
                        "<td >" + data[i].modelo + "</td>" +
                        "<td >" + data[i].nombre + "</td>" +
                        "</tr>" +

                        "<tr class='expandable-body'>" +

                        "<td colspan='3'>" +
                        "<p class='descripcionmaquina'>" + data[i].descripcion + "</p>" +
                        "</td>" +

                        "<td colspan='1'>" +
                        "<img src='" + data[i].imagen + "' class='img-fluid'>" +
                        "</td>" +

                        "</tr>"

                    );
                }
            }
        });
    }

    function mostrarPartes(id) {
        // ajaz de las partes
        $.ajax({
            type: "post",
            url: "accion/buscarMaquinaParte.php",
            data: {
                id: id
            },
            success: function(response) {
                var data = jQuery.parseJSON(response);
                var largo = data.length;

                $("#tablaPartesInfo").empty();

                for (let i = 0; i < largo; i++) {
                    $("#tablaPartesInfo").append(
                        "<tr data-widget='expandable-table' aria-expanded='true'>" +
                        "<td>" + data[i].id + "</td>" +
                        "<td>" + data[i].parte + "</td>" +
                        "</tr>" +

                        "<tr class='expandable-body'>" +
                        "<td colspan='3'>" +
                        "<p>" + data[i].descripcion + "</p>" +
                        "</td>" +
                        "</tr>"

                    );
                }
            }
        });
    }

    function mostrarSubpartes(id) {
        // ajax para las subpartes
        $.ajax({
            type: "post",
            url: "accion/buscarMaquinaSubparte.php",
            data: {
                id: id
            },
            success: function(response) {
                var data = jQuery.parseJSON(response);
                var largo = data.length;

                $("#tablaSubpartesInfo").empty();

                for (let i = 0; i < largo; i++) {
                    $("#tablaSubpartesInfo").append(
                        "<tr data-widget='expandable-table' aria-expanded='true'>" +
                        "<td>" + data[i].idparte + "</td>" +
                        "<td>" + data[i].parte + "</td>" +
                        "<td>" + data[i].idsubparte + "</td>" +
                        "<td>" + data[i].subparte + "</td>" +
                        "</tr>" +

                        "<tr class='expandable-body'>" +

                        "<td colspan='4'>" +
                        "<p>" + data[i].descripcion + "</p>" +
                        "</td>" +

                        "</tr>"

                    );
                }
            }
        });
    }

});