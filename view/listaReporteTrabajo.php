  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>REPORTES DE TRABAJO</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tabla de reportes de trabajo</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">

                  <div class="row">
                      <div class="col-12">
                          <table id="tablaReporte" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>
                                          ID
                                      </th>
                                      <th>
                                          Titulo
                                      </th>
                                      <th>
                                          Inicio programado
                                      </th>
                                      <th>
                                          Inicio real
                                      </th>
                                      <th>
                                          ID maquina
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT 
                                    reptrabajo.idreptrabajo,
                                    procedimiento.nombre,
                                    ordentrabajo.inicio,
                                    reptrabajo.inicio,
                                    procedimiento.idmaquina,
                                    maquina.nombre
                                    from reptrabajo 
                                    inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
                                    inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
                                    inner join maquina on maquina.id_maq = procedimiento.idmaquina;";

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
                                                    <td>$row[2]</td>
                                                    <td>$row[3]</td>
                                                    <td>$row[4]</td>
                                                    <td>$row[5]</td>
                                                </tr>
                                                ";
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>
                                          ID
                                      </th>
                                      <th>
                                          Titulo
                                      </th>
                                      <th>
                                          Inicio programado
                                      </th>
                                      <th>
                                          Inicio real
                                      </th>
                                      <th>
                                          ID maquina
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>

              </div>
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
                  <h4 class="modal-title">Imprimir Reporte de trabajo</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action='accion/imprimirReporteTrabajo.php' method='post' target='_blank'>
                  <div class="modal-body">
                      <div class="row">

                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="idImprimir">ID Reporte :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idImprimir" id="idImprimir" autocomplete="off">
                              </div>
                          </div>
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label for="nombreImprimir">Titulo del Reporte de Trabajo :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreImprimir" id="nombreImprimir" autocomplete="off">
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" name="btnImprimir" class="btn btn-primary">Imprimir Procedimiento</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <script src="dist/js/listaReporteTrabajo.js"></script>