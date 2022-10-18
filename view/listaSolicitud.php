  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>SOLICITUD DE TRABAJO - LISTA</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->

          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">LISTA DE SOLICITUDES NUEVAS</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table id="tablaSolicitudes" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>
                                          Nro solicitud
                                      </th>
                                      <th>
                                          Titulo
                                      </th>
                                      <th>
                                          Imprimir
                                      <th>
                                          Encargado
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                      <th>
                                          Lugar
                                      </th>
                                      <th>
                                          Fecha
                                      </th>
                                      <th>
                                          Hora
                                      </th>
                                  </tr>
                              </thead>
                              <tbody id="table_trabajador_data">

                                  <?php

                                    $query2 = "Set time_zone = '-05:00';";
                                    mysqli_query($con, $query2);

                                    $query = "SELECT solicitud.idsolicitud,solicitud.titulo,concat(m_trabajador.t_apelllido,', ',m_trabajador.t_nombre) as nombre,
                                    maquina.nombre,lugar.nombre,date(fecha),time(fecha),solicitud.estado
                                                                        from ((solicitud inner join m_trabajador on solicitud.idtrabajador = m_trabajador.t_dni)
                                                                        inner join maquina on solicitud.idmaq = maquina.id_maq)
                                                                        inner join lugar on solicitud.idlugar = lugar.idlugar where solicitud.estado = 1;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "
                                        <tr>
                                        <form action='accion/imprimirSolicitud.php' method='post' target='_blank'>
                                            <td>
                                                <input class='form-control' type='text' readonly name='idSolicitud' value='$row[0]'>
                                            </td>
                                            <td>$row[1]</td>
                                            <td>
                                                <button type='submit' class='btn btn-warning btnTrabajadorActualizar'>
                                                    <i class='fa fa-download' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </form>
                                        <td>$row[2]</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                        <td>$row[5]</td>
                                        <td>$row[6]</td>
                                    </tr>
                                            ";
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>
                                          Nro solicitud
                                      </th>
                                      <th>
                                          Titulo
                                      </th>
                                      <th>
                                          Imprimir
                                      </th>
                                      <th>
                                          Encargado
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                      <th>
                                          Lugar
                                      </th>
                                      <th>
                                          Fecha
                                      </th>
                                      <th>
                                          Hora
                                      </th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>

              </div>
              <!-- /.card -->
          </div>
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">LISTA DE SOLICITUDES LEIDAS</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table id="tablaSolicitudesLeidas" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>
                                          Nro solicitud
                                      </th>
                                      <th>
                                          Titulo
                                      </th>
                                      <th>
                                          Imprimir
                                      </th>
                                      <th>
                                          Encargado
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                      <th>
                                          Lugar
                                      </th>
                                      <th>
                                          Fecha
                                      </th>
                                      <th>
                                          Hora
                                      </th>
                                  </tr>
                              </thead>
                              <tbody id="table_trabajador_data">

                                  <?php

                                    $query2 = "Set time_zone = '-05:00';";
                                    mysqli_query($con, $query2);

                                    $query = "SELECT solicitud.idsolicitud,solicitud.titulo,concat(m_trabajador.t_apelllido,', ',m_trabajador.t_nombre) as nombre,
                                    maquina.nombre,lugar.nombre,date(fecha),time(fecha),solicitud.estado
                                                                        from ((solicitud inner join m_trabajador on solicitud.idtrabajador = m_trabajador.t_dni)
                                                                        inner join maquina on solicitud.idmaq = maquina.id_maq)
                                                                        inner join lugar on solicitud.idlugar = lugar.idlugar where solicitud.estado = 0;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "
                                        <tr>
                                        <form action='accion/imprimirSolicitud.php' method='post' target='_blank'>
                                            <td>
                                                <input class='form-control' type='text' readonly name='idSolicitud' value='$row[0]'>
                                            </td>
                                            <td>$row[1]</td>
                                            <td>
                                                <button type='submit' class='btn btn-warning btnTrabajadorActualizar'>
                                                    <i class='fa fa-download' aria-hidden='true'></i>
                                                </button>
                                            </td>
                                        </form>
                                        <td>$row[2]</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                        <td>$row[5]</td>
                                        <td>$row[6]</td>
                                    </tr>
                                            ";
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>
                                          Nro solicitud
                                      </th>
                                      <th>
                                          Titulo
                                      </th>
                                      <th>
                                          Imprimir
                                      </th>
                                      <th>
                                          Encargado
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                      <th>
                                          Lugar
                                      </th>
                                      <th>
                                          Fecha
                                      </th>
                                      <th>
                                          Hora
                                      </th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>

              </div>
              <!-- /.card -->
          </div>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="dist/js/listaSolicitud.js"></script>