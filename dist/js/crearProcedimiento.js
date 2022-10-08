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
    // $(formCrearProcedimiento).submit();
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
