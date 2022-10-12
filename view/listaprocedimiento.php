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
                                          Requerimiento
                                      </th>
                                      <th>
                                          Subparte
                                      </th>
                                      <th>
                                          Estrategia
                                      </th>
                                      <th>
                                          Duracion (min)
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
                                    idparte,
                                    idsubparte,
                                    estrategia.nombre,
                                    cargalab,
                                    concat(t_apelllido, ', ',t_nombre),
                                    lugar.nombre,
                                    instruccion,
                                    ley
                                    FROM 
                                    ((procedimiento inner join estrategia on procedimiento.idestrategia = estrategia.idestrategia)
                                    inner join lugar on procedimiento.idlugar = lugar.idlugar)
                                    inner join m_trabajador on m_trabajador.t_dni = procedimiento.idtrabajador;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "
                                                <tr>
                                                    <td class='id'>$row[0]</td>
                                                    <td class='nombre'>$row[1]</td>
                                                    <td>
                                                        <button class='btn btn-warning btnBuscarProc'>
                                                            Buscar <i class='fa fa-search' aria-hidden='true'P></i>
                                                        </button>
                                                    </td>
                                                    <td>$row[4]</td>
                                                    <td>$row[5]</td>
                                                    <td>$row[6]</td>
                                                    <td>$row[7]</td>
                                                    <td>$row[8]</td>
                                                    <td><a href='$row[9]' class='btn btn-link' target='_blank'>Hoja de ruta <i class='fa fa-download' aria-hidden='true'></i></a></td>
                                                    <td><a href='$row[10]' class='btn btn-link' target='_blank'>Ley <i class='fa fa-download' aria-hidden='true'></i></a></td>
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
                                          Requerimiento
                                      </th>
                                      <th>
                                          Subparte
                                      </th>
                                      <th>
                                          Estrategia
                                      </th>
                                      <th>
                                          Duracion (min)
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


  <div class="modal fade" id="modalBuscarReq">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Requerimientos del procedimiento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">

                      <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                              <label for="idBuscarReq">Id :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idBuscarReq" id="idBuscarReq" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-10 col-sm-12">
                          <div class="form-group">
                              <label for="nombreBuscarReq">Nombre :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreBuscarReq" id="nombreBuscarReq" autocomplete="off">
                          </div>
                      </div>

                      <br>
                      <hr>
                      <br>

                      <div class="col-lg-12 col-sm-12">
                          <div class="form-group">
                              <table class = "table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>NOMBRE</th>
                                          <th>CANTIDAD</th>
                                          <th>UNIDAD</th>
                                          <th>COSTO DE USO</th>
                                      </tr>
                                  </thead>
                                  <tbody id="dataReq">

                                  </tbody>
                              </table>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script src="dist/js/listaProcedimiento.js"></script>