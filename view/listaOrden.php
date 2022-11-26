  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>ORDEN DE TRABAJO - LISTA</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->

          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">ORDEN DE TRABAJO ABIERTAS</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table id="tablaOrdenAbierta" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>ID Orden</th>
                                      <th>Titulo</th>
                                      <th>Duracion</th>
                                      <th>Fecha inic</th>
                                      <th>Hora inic</th>
                                      <th>Fecha fin</th>
                                      <th>Hora fin</th>
                                      <th>Prioridad</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  <?php

                                    $query = " SELECT 
                                    orden.idorden,
                                    proc.nombre,
                                    proc.cargalab,
                                    DATE(orden.inicio),
                                    TIME(orden.inicio),
                                    DATE(orden.final),
                                    TIME(orden.final),
                                    prioridad.nombre
                                    FROM ordentrabajo as orden 
                                    INNER JOIN procedimiento as proc on orden.idprocedimiento = proc.idprocedimiento 
                                    INNER JOIN prioridad on orden.idprioridad = prioridad.idprioridad
                                    WHERE orden.estado = 1;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "
                                    <tr>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2] min</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                        <td>$row[5]</td>
                                        <td>$row[6]</td>
                                        <td>$row[7]</td>
                                    </tr>
                                    ";
                                    }
                                    ?>

                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID Orden</th>
                                      <th>Titulo</th>
                                      <th>Duracion</th>
                                      <th>Fecha inic</th>
                                      <th>Hora inic</th>
                                      <th>Fecha fin</th>
                                      <th>Hora fin</th>
                                      <th>Prioridad</th>
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
                  <h3 class="card-title">ORDEN DE TRABAJO CERRADAS</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table id="tablaOrdenCerrada" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>ID Orden</th>
                                      <th>Titulo</th>
                                      <th>Duracion</th>
                                      <th>Fecha inic</th>
                                      <th>Hora inic</th>
                                      <th>Fecha fin</th>
                                      <th>Hora fin</th>
                                      <th>Prioridad</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php

                                    $query = " SELECT 
                                    orden.idorden,
                                    proc.nombre,
                                    proc.cargalab,
                                    DATE(orden.inicio),
                                    TIME(orden.inicio),
                                    DATE(orden.final),
                                    TIME(orden.final),
                                    prioridad.nombre
                                    FROM ordentrabajo as orden 
                                    INNER JOIN procedimiento as proc on orden.idprocedimiento = proc.idprocedimiento 
                                    INNER JOIN prioridad on orden.idprioridad = prioridad.idprioridad
                                    WHERE orden.estado = 2;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "
                                    <tr>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2] min</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                        <td>$row[5]</td>
                                        <td>$row[6]</td>
                                        <td>$row[7]</td>
                                    </tr>
                                    ";
                                    }

                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID Orden</th>
                                      <th>Titulo</th>
                                      <th>Duracion</th>
                                      <th>Fecha inic</th>
                                      <th>Hora inic</th>
                                      <th>Fecha fin</th>
                                      <th>Hora fin</th>
                                      <th>Prioridad</th>
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

  <!-- modal imprimir-->
  <div class="modal fade" id="modalImprimir">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Imprimir orden de trabajo</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action='accion/imprimirOrden.php' method='post' target='_blank'>
                  <div class="modal-body">
                      <div class="row">

                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="idImprimir">ID Orden de trabajo :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idImprimir" id="idImprimir" autocomplete="off">
                              </div>
                          </div>
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label for="nombreImprimir">Titulo de orden de trabajo :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreImprimir" id="nombreImprimir" autocomplete="off">
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" name="btnImprimir" class="btn btn-primary">Imprimir Orden de trabajo</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <!-- modal eliminar-->
  <div class="modal fade" id="modalEliminar">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Eliminar orden de trabajo </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">

                      <div class="col-lg-3 col-sm-12">
                          <div class="form-group">
                              <label for="idEliminar">ID orden de trabajo :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idEliminar" id="idEliminar" autocomplete="off">
                          </div>
                      </div>
                      <div class="col-lg-9 col-sm-12">
                          <div class="form-group">
                              <label for="nombreEliminar">Titulo de orden de trabajo :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreEliminar" id="nombreEliminar" autocomplete="off">
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger">Eliminar Orden de trabajo</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script src="dist/js/listaOrden.js"></script>