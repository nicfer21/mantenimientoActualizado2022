  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trabajadores
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
      <div class="col-12">

      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-auto">
              <h4>TRABAJADORES</h4>
            </div>
            <div class="col-auto">
              <button class="btn btn-primary" data-toggle='modal' data-target='#modalCrear'>
                Crear
              </button>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de trabajadores de mantenimiento de la empresa</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <table id="table_trabajador" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>
                      D.N.I.
                    </th>
                    <th>
                      Apellidos
                    </th>
                    <th>
                      Nombres
                    </th>
                    <th>
                      Profesion
                    </th>
                    <th>
                      Tipo de pago
                    </th>
                    <th>
                      Tarifa
                    </th>
                    <th>
                      Actualizar
                    </th>
                  </tr>
                </thead>
                <tbody id="table_trabajador_data">
                  <?php

                  $query = "SELECT m_trabajador.t_dni, m_trabajador.t_apelllido, m_trabajador.t_nombre, m_profesion.p_prof, m_jornada.j_jor, m_trabajador.t_tarifa 
                  from ((m_trabajador inner join m_profesion ON m_trabajador.t_profesion = m_profesion.p_id) inner join m_jornada ON m_trabajador.t_jornada  = m_jornada.j_id )
                   where m_trabajador.t_estado = '1';";

                  $rs = mysqli_query($con, $query);

                  $rows = array();

                  while ($row = mysqli_fetch_row($rs)) {
                    $rows[] = $row;
                  }

                  foreach ($rows as $row) {
                    echo "
                    <tr>
                        <td class='dni'>$row[0]</td>
                        <td class='apellido'>$row[1]</td>
                        <td class='nombre'>$row[2]</td>
                        <td class='profesion'>$row[3]</td>
                        <td class='jornada'>$row[4]</td>
                        <td class='tarifa'>$row[5]</td>
                        <td>
                          <button class='btn btn-warning btnTrabajadorActualizar' data-toggle='modal' data-target='#modalActualizar'>
                            Actualizar
                          </button>
                        </td>
                    </tr>
                    ";
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>
                      D.N.I.
                    </th>
                    <th>
                      Apellidos
                    </th>
                    <th>
                      Nombres
                    </th>
                    <th>
                      Profesion
                    </th>
                    <th>
                      Jornada
                    </th>
                    <th>
                    Tipo de pago
                    </th>
                    <th>
                      Actualizar
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- Modal Actualizar -->
      <div class="modal fade" id="modalActualizar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Actualizar Trabajador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="accion/actualizarTrabajador.php" id="formTrabajadorActualizar" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="txtdniTrabajadorActualizar">D.N.I. :</label>
                      <input type="text" readonly class="form-control form-control-border border-width-2" name="txtdniTrabajadorActualizar" id="txtdniTrabajadorActualizar" placeholder="D.N.I." autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="txtapellidoTrabajadorActualizar">Apellidos :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="txtapellidoTrabajadorActualizar" id="txtapellidoTrabajadorActualizar" placeholder="Apellidos paterno y materno" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="txtnombreTrabajadorActualizar">Nombres :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="txtnombreTrabajadorActualizar" id="txtnombreTrabajadorActualizar" placeholder="Primer y segundo nombre" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="txtprofesionTrabajadorActualizar">Profesion :</label>
                      <select name="txtprofesionTrabajadorActualizar" id="txtprofesionTrabajadorActualizar" class="custom-select form-control-border border-width-2" id="exampleSelectBorder">
                        <?php
                        $query = "SELECT * FROM m_profesion;";

                        $rs = mysqli_query($con, $query);

                        $rows = array();

                        while ($row = mysqli_fetch_row($rs)) {
                          $rows[] = $row;
                        }

                        foreach ($rows as $row) {
                          echo "
                          <option value='$row[0]'>$row[1]</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="txtjornadaTrabajadorActulizar">Tipo de pago :</label>
                      <select name="txtjornadaTrabajadorActulizar" id="txtjornadaTrabajadorActulizar" class="custom-select form-control-border border-width-2" id="exampleSelectBorder">
                        <?php
                        $query = "SELECT * FROM m_jornada;";

                        $rs = mysqli_query($con, $query);

                        $rows = array();

                        while ($row = mysqli_fetch_row($rs)) {
                          $rows[] = $row;
                        }

                        foreach ($rows as $row) {
                          echo "
                          <option value='$row[0]'>$row[1]</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="txttarifaTrabajadorActualizar">Tarifa :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fw-bold">
                            S/.
                          </span>
                        </div>
                        <input type="text" class="form-control" name="txttarifaTrabajadorActualizar" id="txttarifaTrabajadorActualizar" placeholder="Tarifa laboral del trabajdor" autocomplete="off">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnTrabajadorActualizar1" class="btn btn-warning">Actualizar</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Modal Eliminar -->
      <div class="modal fade" id="modalEliminar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar trabajador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="formEliminarTrabajador" action="accion/eliminarTrabajador.php" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="txteliminardni">D.N.I. del Trabajador :</label>
                      <input type="text" readonly class="form-control form-control-border border-width-2" name="txteliminardni" id="txteliminardni" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="txteliminarapellido">Nombre del Trabajador :</label>
                      <input type="text" readonly class="form-control form-control-border border-width-2" name="txteliminarapellido" id="txteliminarapellido" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnTrabajdorEliminar1" class="btn btn-danger">Eliminar</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Modal Crear -->
      <div class="modal fade" id="modalCrear">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar nuevo trabajador</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="formCrearTrabajador" action="accion/guardarTrabajador.php" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">

                    <div class="form-group">
                      <label for="txtdni">Ingrese el D.N.I. :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="txtdni" id="txtdni" placeholder="D.N.I." autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="txtapellido">Ingrese los Apellidos :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="txtapellido" id="txtapellido" placeholder="Apellidos paterno y materno" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <label for="txtnombre">Ingrese los Nombres :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="txtnombre" id="txtnombre" placeholder="Primer y segundo nombre" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="txtprofesion">Seleccione la profesion :</label>
                      <select name="txtprofesion" id="txtprofesion" class="custom-select form-control-border border-width-2" id="exampleSelectBorder">
                        <?php
                        $query = "SELECT * FROM m_profesion;";

                        $rs = mysqli_query($con, $query);

                        $rows = array();

                        while ($row = mysqli_fetch_row($rs)) {
                          $rows[] = $row;
                        }

                        foreach ($rows as $row) {
                          echo "
                          <option value='$row[0]'>$row[1]</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="txtjornada">Seleccione el tipo de pago :</label>
                      <select name="txtjornada" id="txtjornada" class="custom-select form-control-border border-width-2" id="exampleSelectBorder">

                        <?php
                        $query = "SELECT * FROM m_jornada;";

                        $rs = mysqli_query($con, $query);

                        $rows = array();

                        while ($row = mysqli_fetch_row($rs)) {
                          $rows[] = $row;
                        }

                        foreach ($rows as $row) {
                          echo "
                          <option value='$row[0]'>$row[1]</option>
                          ";
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="txttarifa">Ingrese su tarifa :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fw-bold">
                            S/.
                          </span>
                        </div>
                        <input type="text" class="form-control" name="txttarifa" id="txttarifa" placeholder="Tarifa laboral del trabajdor" autocomplete="off">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnTrabajadorCrear" class="btn btn-primary">Guardar datos</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Propio -->
  <script src="dist/js/trabajador.js"></script>