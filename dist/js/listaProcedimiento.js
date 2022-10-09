$(document).ready(function () {

    var dataReq = $("#dataReq");
    var idBuscarReq = $("#idBuscarReq");
    var nombreBuscarReq = $("#nombreBuscarReq");

    $("#tablaProcedimiento").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        select: true
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


});