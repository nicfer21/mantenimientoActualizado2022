$(document).ready(function () {

  var nombre = $("#nombre");
  var estrategia = $("#estrategia");
  var lugar = $("#lugar");
  var carga = $("#carga")
  var instrucciones = $("#instrucciones");
  var leynorma = $("#leynorma");

  var idmaq = $("#idmaq");
  var idparte = $("#idparte");
  var idsubparte = $("#idsubparte");

  var trabajador = $("#trabajador");

  var btnGuardar = $("#btnGuardar");


  var dniT = $("#dniT");
  var nombreT = $("#nombreT");
  var ocupacionT = $("#ocupacionT");
  var pagaT = $("#pagaT");

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

  idparte.prop("disabled", true);
  idsubparte.prop("disabled", true);
  btnModalAgregarFila.prop("disabled", true);

  $(".select2").select2();

  $(estrategia).change(function (e) {
    $("#estrategia option[value='o']").remove();
  });

  $(lugar).change(function (e) {
    $("#lugar option[value='o']").remove();
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

  });

  $(trabajador).change(function (e) {

    $("#trabajador option[value='o']").remove();

    var dni = $(trabajador).val();

    $.ajax({
      type: "post",
      url: "accion/buscarTrabajador.php",
      data: {
        dni: dni
      },
      success: function (response) {
        var data = jQuery.parseJSON(response);

        $(dniT).val(data[0].dni);
        $(nombreT).val(data[0].nombre);
        $(ocupacionT).val(data[0].ocupacion);
        $(pagaT).val(data[0].paga);

      },
    });

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
    $("#modalCrear").modal("show");
    limpiarModal();
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

    var costoTotal = cantidad * $(costoBuscarElemento).val();

    agregarF(id, nombre, costo, categoria, tipo, cantidad, costoTotal);

    $("#modalCrear").modal("hide");

  });

  $(btnGuardar).click(function (e) {

    var k = 0;

    if (nombre.val() == "") {
      $(nombre).addClass("is-invalid");
      $(nombre).removeClass("is-valid");
    } else {
      $(nombre).addClass("is-valid");
      $(nombre).removeClass("is-invalid");
      k++;
    }

    if (estrategia.val() == "o") {
      $(estrategia).addClass("is-invalid");
      $(estrategia).removeClass("is-valid");
    } else {
      $(estrategia).addClass("is-valid");
      $(estrategia).removeClass("is-invalid");
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

    if (carga.val() == "") {
      $(carga).addClass("is-invalid");
      $(carga).removeClass("is-valid");
      $(carga).removeClass("is-warning");
    } else {
      if (!isNaN(carga.val())) {
        $(carga).addClass("is-valid");
        $(carga).removeClass("is-invalid");
        $(carga).removeClass("is-warning");
        k++;
      } else {
        $(carga).addClass("is-warning");
        $(carga).removeClass("is-valid");
        $(carga).removeClass("is-invalid");
      }
    }

    if (lugar.val() == "o") {
      $(lugar).addClass("is-invalid");
      $(lugar).removeClass("is-valid");
    } else {
      $(lugar).addClass("is-valid");
      $(lugar).removeClass("is-invalid");
      k++;
    }

    if (instrucciones.val() == "") {
      $(instrucciones).addClass("is-invalid");
      $(instrucciones).removeClass("is-valid");
    } else {
      $(instrucciones).addClass("is-valid");
      $(instrucciones).removeClass("is-invalid");
      k++;
    }

    if (leynorma.val() == "") {
      $(leynorma).addClass("is-invalid");
      $(leynorma).removeClass("is-valid");
    } else {
      $(leynorma).addClass("is-valid");
      $(leynorma).removeClass("is-invalid");
      k++;
    }

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

    if (trabajador.val() == "o") {
      $(trabajador).addClass("is-invalid");
      $(trabajador).removeClass("is-valid");
    } else {
      $(trabajador).addClass("is-valid");
      $(trabajador).removeClass("is-invalid");
      k++;
    }

    if (k == 11) {
      $(formCrearProcedimiento).submit();
    } else {

      Swal.fire({
        icon: 'error',
        title: 'Ocurrio un Error',
        text: 'Verifica que todo este completo en donde se le indica y en orden',
        timer: 2000
      });

    }

  });











  function limpiarModal() {
    $(usarBuscarElemento).val("");
  }

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

});
