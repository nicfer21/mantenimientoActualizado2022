$(document).ready(function () {

  $("#table_trabajador").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#table_trabajador_wrapper .col-md-6:eq(0)');

  $("#btnTrabajadorCrear").click(function (e) {

    var dni = $('#txtdni');
    var apellido = $('#txtapellido');
    var nombre = $('#txtnombre');
    var tarifa = $('#txttarifa');

    var i = 0;

    if (dni.val() == "") {
      $(dni).addClass("is-invalid");
      $(dni).removeClass("is-valid");
      $(dni).removeClass("is-warning");
    } else {
      if (!isNaN(dni.val()) && dni.val().length == 8) {
        $(dni).addClass("is-valid");
        $(dni).removeClass("is-invalid");
        $(dni).removeClass("is-warning");
        i++;
      } else {
        $(dni).addClass("is-warning");
        $(dni).removeClass("is-valid");
        $(dni).removeClass("is-invalid");
      }
    }

    if (apellido.val() == "") {
      $(apellido).addClass("is-invalid");
      $(apellido).removeClass("is-valid");
    } else {
      $(apellido).addClass("is-valid");
      $(apellido).removeClass("is-invalid");
      i++;
    }

    if (nombre.val() == "") {
      $(nombre).addClass("is-invalid");
      $(nombre).removeClass("is-valid");
    } else {
      $(nombre).addClass("is-valid");
      $(nombre).removeClass("is-invalid");
      i++;
    }

    if (tarifa.val() == "") {
      $(tarifa).addClass("is-invalid");
      $(tarifa).removeClass("is-valid");
    } else if (!isNaN(tarifa.val())) {
      i++;
      $(tarifa).addClass("is-valid");
      $(tarifa).removeClass("is-invalid");
    } else {
      $(tarifa).addClass("is-invalid");
      $(tarifa).removeClass("is-valid");
    }

    if (i == 4) {
      $('#formCrearTrabajador').submit();
    }

  });

  $(".btnTrabajadorActualizar").click(function (e) {

    let dni = $(this).parents("tr").find(".dni").html();
    let apellido = $(this).parents("tr").find(".apellido").html();
    let nombre = $(this).parents("tr").find(".nombre").html();
    let profesion = $(this).parents("tr").find(".profesion").html();
    let jornada = $(this).parents("tr").find(".jornada").html();
    let tarifa = $(this).parents("tr").find(".tarifa").html();

    $("#txtdniTrabajadorActualizar").val(dni);
    $('#txtapellidoTrabajadorActualizar').val(apellido);
    $('#txtnombreTrabajadorActualizar').val(nombre);

    $("#txtprofesionTrabajadorActualizar option[value='" + profesion + "']").attr("selected", true);
    $("#txtjornadaTrabajadorActulizar option[value='" + jornada + "']").attr("selected", true);

    $('#txttarifaTrabajadorActualizar').val(tarifa);

  });

  $("#btnTrabajadorActualizar1").click(function (e) {

    var i = 0;

    if ($('#txtapellidoTrabajadorActualizar').val() == "") {
      $('#txtapellidoTrabajadorActualizar').addClass("is-invalid");
      $('#txtapellidoTrabajadorActualizar').removeClass("is-valid");
    } else {
      $('#txtapellidoTrabajadorActualizar').addClass("is-valid");
      $('#txtapellidoTrabajadorActualizar').removeClass("is-invalid");
      i++;
    }


    if ($('#txtnombreTrabajadorActualizar').val() == "") {
      $('#txtnombreTrabajadorActualizar').addClass("is-invalid");
      $('#txtnombreTrabajadorActualizar').removeClass("is-valid");
    } else {
      $('#txtnombreTrabajadorActualizar').addClass("is-valid");
      $('#txtnombreTrabajadorActualizar').removeClass("is-invalid");
      i++;
    }

    if ($('#txttarifaTrabajadorActualizar').val() == "") {
      $('#txttarifaTrabajadorActualizar').addClass("is-invalid");
      $('#txttarifaTrabajadorActualizar').removeClass("is-valid");
    } else if (!isNaN($('#txttarifaTrabajadorActualizar').val())) {
      i++;
      $('#txttarifaTrabajadorActualizar').addClass("is-valid");
      $('#txttarifaTrabajadorActualizar').removeClass("is-invalid");
    } else {
      $('#txttarifaTrabajadorActualizar').addClass("is-invalid");
      $('#txttarifaTrabajadorActualizar').removeClass("is-valid");
    }

    if (i == 3) {
      $('#formTrabajadorActualizar').submit();
    }

  });

  $(".btnTrabajadorEliminar").click(function (e) {

    let dni = $(this).parents("tr").find(".dni").html();
    let apellido = $(this).parents("tr").find(".apellido").html();
    let nombre = $(this).parents("tr").find(".nombre").html();

    $("#txteliminardni").val(dni);

    $("#txteliminarapellido").val(apellido + ", " + nombre);

  });

  $("#btnTrabajdorEliminar1").click(function (e) {

    $("#formEliminarTrabajador").submit();

  });

});