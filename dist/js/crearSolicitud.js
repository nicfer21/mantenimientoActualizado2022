$(document).ready(function () {

    var titulo = $("#titulo");
    var id = $("#id");
    var maquina = $("#maquina");
    var lugar = $("#lugar");
    var descripcion = $('#descripcion').summernote();

    var btnGuardar = $("#btnGuardar");

    var formGuardar = $("#formGuardar");

    $(maquina).change(function (e) {
        $("#maquina option[value='o']").remove();
    });

    $(lugar).change(function (e) {
        $("#lugar option[value='o']").remove();
    });

    $(btnGuardar).click(function (e) {
        var k = 0;

        if (titulo.val() == "") {
            $(titulo).addClass("is-invalid");
            $(titulo).removeClass("is-valid");
        } else {
            $(titulo).addClass("is-valid");
            $(titulo).removeClass("is-invalid");
            k++;
        }

        if (maquina.val() == "o") {
            $(maquina).addClass("is-invalid");
            $(maquina).removeClass("is-valid");
        } else {
            $(maquina).addClass("is-valid");
            $(maquina).removeClass("is-invalid");
            k++;
        }

        if (lugar.val() == "o") {
            $(lugar).addClass("is-invalid");
            $(lugar).removeClass("is-valid");
        } else {
            $(lugar).addClass("is-valid");
            $(lugar).removeClass("is-invalid");
            k++;
        }

        if (k == 3) {
            guardar();
            $(formGuardar).submit();
        } else {
            error();
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
    function error() {
        Swal.fire({
            icon: 'error',
            title: 'Ocurrio un Error',
            text: 'Verifica que todo este completo y en orden',
            timer: 2000
        })
    }



});