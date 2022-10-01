$(document).ready(function () {

  var tablaCategoria = $("#tabla_categoria").DataTable({

    "responsive": true,
    "lengthChange": true,
    "autoWidth": true,

    ajax: 'accion/mostrarCategoria.php',
    columns: [
      { data: 0 },
      { data: 1 }
    ],

    select: true

  });

  var tablaProveedor = $("#tabla_proveedor").DataTable({

    "responsive": true,
    "lengthChange": true,
    "autoWidth": true,

    ajax: 'accion/mostrarProveedor.php',
    columns: [
      { data: 0 },
      { data: 1 }
    ],

    select: true

  });

  var tablaFabricante = $("#tabla_fabricante").DataTable({

    "responsive": true,
    "lengthChange": true,
    "autoWidth": true,

    ajax: 'accion/mostrarFabricante.php',
    columns: [
      { data: 0 },
      { data: 1 }
    ],

    select: true

  });

//Categoria
var switchCategoria = $("#switchCategoria");
  var idCategoria = $("#idCategoria");
  var nombreCategoria = $("#nombreCategoria");
  var btnActualizarCategoria = $("#btnActualizarCategoria");
  var btnCrearCategoria = $("#btnCrearCategoria");

  //Fabricante
  var switchFabricante = $("#switchFabricante");
  var idFabricante = $("#idFabricante");
  var nombreFabricante = $("#nombreFabricante");
  var btnActualizarFabricante = $("#btnActualizarFabricante");
  var btnCrearFabricante = $("#btnCrearFabricante");

  //Proveedor
  var switchProveedor = $("#switchProveedor");
  var idProveedor = $("#idProveedor");
  var nombreProveedor = $("#nombreProveedor");
  var btnActualizarProveedor = $("#btnActualizarProveedor");
  var btnCrearProveedor = $("#btnCrearProveedor");

  //Categoria
  btnActualizarCategoria.prop("disabled", true);
  btnCrearCategoria.prop("disabled", false);
  //Fabricante
  btnActualizarFabricante.prop("disabled", true);
  btnCrearFabricante.prop("disabled", false);
  //Proveedor
  btnActualizarProveedor.prop("disabled", true);
  btnCrearProveedor.prop("disabled", false);

  //Categoria
  $('#tabla_categoria tbody').on('click', 'tr', function () {

    var data = tablaCategoria.row(this).data();

    if (switchCategoria.is(":checked")) {

      idCategoria.val(data[0]);
      nombreCategoria.val(data[1]);

    }

  });
  //Fabricante
  $('#tabla_fabricante tbody').on('click', 'tr', function () {

    var data = tablaFabricante.row(this).data();

    if (switchFabricante.is(":checked")) {

      idFabricante.val(data[0]);
      nombreFabricante.val(data[1]);

    }

  });
  //Proveedor
  $('#tabla_proveedor tbody').on('click', 'tr', function () {

    var data = tablaProveedor.row(this).data();

    if (switchProveedor.is(":checked")) {

      idProveedor.val(data[0]);
      nombreProveedor.val(data[1]);

    }

  });

  //Categoria
  switchCategoria.click(function (e) {
    if (switchCategoria.is(":checked")) {

      btnActualizarCategoria.prop("disabled", false);
      btnCrearCategoria.prop("disabled", true);

      idCategoria.val("");
      nombreCategoria.val("");

    } else {

      btnActualizarCategoria.prop("disabled", true);
      btnCrearCategoria.prop("disabled", false);

      idCategoria.val("");
      nombreCategoria.val("");

    }
  });
  //Fabricante
  switchFabricante.click(function (e) {
    if (switchFabricante.is(":checked")) {

      btnActualizarFabricante.prop("disabled", false);
      btnCrearFabricante.prop("disabled", true);

      idFabricante.val("");
      nombreFabricante.val("");

    } else {

      btnActualizarFabricante.prop("disabled", true);
      btnCrearFabricante.prop("disabled", false);

      idFabricante.val("");
      nombreFabricante.val("");

    }
  });
  //Proveedor
  switchProveedor.click(function (e) {
    if (switchProveedor.is(":checked")) {

      btnActualizarProveedor.prop("disabled", false);
      btnCrearProveedor.prop("disabled", true);

      idProveedor.val("");
      nombreProveedor.val("");

    } else {

      btnActualizarProveedor.prop("disabled", true);
      btnCrearProveedor.prop("disabled", false);

      idProveedor.val("");
      nombreProveedor.val("");

    }
  });

   //Categoria
   btnCrearCategoria.click(function (e) {
    if (nombreCategoria.val() == "") {
      error();
    } else {
      $.ajax({
        type: "post",
        url: "accion/guardarCategoria.php",
        data: {
          nombre: nombreCategoria.val()
        },
        success: function (response) {
          if (response == 1) {
            nombreCategoria.val("");
            guardar();
            tablaCategoria.ajax.reload();
          } else {
            error();
            tablaCategoria.ajax.reload();
          }
        }
      });
    }
  });
  btnActualizarCategoria.click(function (e) {
    if (nombreCategoria.val() == "") {
      error();
    } else {

      Swal.fire({
        title: '¿Estás seguro de actualizar?',
        text: "Podra cambiarlo después",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Actualizar!'
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({
            type: "post",
            url: "accion/actualizarCategoria.php",
            data: {
              id: idCategoria.val(),
              nombre: nombreCategoria.val()
            },
            success: function (response) {
              if (response == 1) {
                idCategoria.val("");
                nombreCategoria.val("");
                actualizar();
                tablaCategoria.ajax.reload();
              } else {
                error();
                tablaCategoria.ajax.reload();
              }
            }
          });

        }
      })


    }

  });
  //Fabricante
  btnCrearFabricante.click(function (e) {
    if (nombreFabricante.val() == "") {
      error();
    } else {
      $.ajax({
        type: "post",
        url: "accion/guardarFabricante.php",
        data: {
          nombre: nombreFabricante.val()
        },
        success: function (response) {
          if (response == 1) {
            nombreFabricante.val("");
            guardar();
            tablaFabricante.ajax.reload();
          } else {
            error();
            tablaFabricante.ajax.reload();
          }
        }
      });
    }
  });
  btnActualizarFabricante.click(function (e) {
    if (nombreFabricante.val() == "") {
      error();
    } else {

      Swal.fire({
        title: '¿Estás seguro de actualizar?',
        text: "Podra cambiarlo después",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Actualizar!'
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({
            type: "post",
            url: "accion/actualizarFabricante.php",
            data: {
              id: idFabricante.val(),
              nombre: nombreFabricante.val()
            },
            success: function (response) {
              if (response == 1) {
                idFabricante.val("");
                nombreFabricante.val("");
                actualizar();
                tablaFabricante.ajax.reload();
              } else {
                error();
                tablaFabricante.ajax.reload();
              }
            }
          });

        }
      })


    }

  });
  //Proveedor
  btnCrearProveedor.click(function (e) {
    if (nombreProveedor.val() == "") {
      error();
    } else {
      $.ajax({
        type: "post",
        url: "accion/guardarProveedor.php",
        data: {
          nombre: nombreProveedor.val()
        },
        success: function (response) {
          if (response == 1) {
            nombreProveedor.val("");
            guardar();
            tablaProveedor.ajax.reload();
          } else {
            error();
            tablaProveedor.ajax.reload();
          }
        }
      });
    }
  });
  btnActualizarProveedor.click(function (e) {
    if (nombreProveedor.val() == "") {
      error();
    } else {

      Swal.fire({
        title: '¿Estás seguro de actualizar?',
        text: "Podra cambiarlo después",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Actualizar!'
      }).then((result) => {
        if (result.isConfirmed) {

          $.ajax({
            type: "post",
            url: "accion/actualizarProveedor.php",
            data: {
              id: idProveedor.val(),
              nombre: nombreProveedor.val()
            },
            success: function (response) {
              if (response == 1) {
                idProveedor.val("");
                nombreProveedor.val("");
                actualizar();
                tablaProveedor.ajax.reload();
              } else {
                error();
                tablaProveedor.ajax.reload();
              }
            }
          });

        }
      })


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


// actualiza la tabla -> tablaProveedor.ajax.reload();
// marcar un switch $("#mi_caja").prop("checked", true);
// desmarcar un switch $("#mi_caja").prop("checked", false);
// Disable #x -> $( "#x" ).prop( "disabled", true );
// Enable #x -> $( "#x" ).prop( "disabled", false );