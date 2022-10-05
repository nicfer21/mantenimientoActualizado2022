$(document).ready(function () {
  var nombre = $("#nombre");
  var estrategia = $("#estrategia");
  var lugar = $("#lugar");
  var instrucciones = $("#instrucciones");
  var leynorma = $("#leynorma");

  var idmaq = $("#idmaq");
  var idparte = $("#idparte");
  var idsubparte = $("#idsubparte");

  idparte.prop("disabled", true);
  idsubparte.prop("disabled", true);

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

});
