  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>PROCEDIMIENTOS</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tabla de procedimientos</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">

                  <div class="row">
                      <div class="col-12">
                          <table id="tablaProcedimiento" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>
                                          ID
                                      </th>
                                      <th>
                                          Nombre
                                      </th>
                                      <th>
                                          ID Maquina
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                      <th>
                                          Subparte
                                      </th>
                                      <th>
                                          Estrategia
                                      </th>
                                      <th>
                                          Trabajador
                                      </th>
                                      <th>
                                          Area
                                      </th>
                                      <th>
                                          Instrucciones
                                      </th>
                                      <th>
                                          Leyes y normas
                                      </th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT 
                                    idprocedimiento,
                                    procedimiento.nombre,
                                    idmaquina,
                                    maquina.nombre,
                                    idsubparte,
                                    estrategia.nombre,
                                    concat(t_apelllido, ', ',t_nombre),
                                    lugar.nombre,
                                    instruccion,
                                    ley
                                    FROM 
                                    (((procedimiento inner join estrategia on procedimiento.idestrategia = estrategia.idestrategia)
                                    inner join lugar on procedimiento.idlugar = lugar.idlugar)
                                    inner join m_trabajador on m_trabajador.t_dni = procedimiento.idtrabajador)
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
                                                    <td>$row[6]</td>
                                                    <td>$row[7]</td>
                                                    <td><a href='$row[8]' class='btn btn-link' target='_blank'>Hoja de ruta <i class='fa fa-download' aria-hidden='true'></i></a></td>
                                                    <td><a href='$row[9]' class='btn btn-link' target='_blank'>Guia<i class='fa fa-download' aria-hidden='true'></i></a></td>
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
                                          Nombre
                                      </th>
                                      <th>
                                          ID Maquina
                                      </th>
                                      <th>
                                          Maquina
                                      </th>
                                      <th>
                                          Subparte
                                      </th>
                                      <th>
                                          Estrategia
                                      </th>
                                      <th>
                                          Trabajador
                                      </th>
                                      <th>
                                          Area
                                      </th>
                                      <th>
                                          Instrucciones
                                      </th>
                                      <th>
                                          Leyes y normas
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
                  <h4 class="modal-title">Imprimir procedimiento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action='accion/imprimirProcedimiento.php' method='post' target='_blank'>
                  <div class="modal-body">
                      <div class="row">

                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="idImprimir">ID Procedimiento :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idImprimir" id="idImprimir" autocomplete="off">
                              </div>
                          </div>
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label for="nombreImprimir">Titulo :</label>
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


  <!-- modal eliminar-->
  <div class="modal fade" id="modalEliminar">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Eliminar procedimiento </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">

                      <div class="col-lg-3 col-sm-12">
                          <div class="form-group">
                              <label for="idEliminar">ID Procedimiento :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idEliminar" id="idEliminar" autocomplete="off">
                          </div>
                      </div>
                      <div class="col-lg-9 col-sm-12">
                          <div class="form-group">
                              <label for="nombreEliminar">Titulo :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreEliminar" id="nombreEliminar" autocomplete="off">
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="btnEliminar" name="btnEliminar" class="btn btn-danger">Eliminar Procedimiento</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->




  <script src="dist/js/listaProcedimiento.js"></script>