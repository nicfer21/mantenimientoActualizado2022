  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>CREACION DE PROCEDIMIENTOS</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form id="formCrearProcedimiento" action="accion/guardarProcedimiento.php" method="POST">

              <!-- Datos generales -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Datos del procedimiento</h3>
                  </div>
                  <div class="card-body">
                      <div class="row">

                          <!-- Nombre -->
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="nombre">Ingrese el nombre del nuevo procedimiento : </label>
                                  <input type="text" class="form-control form-control-border border-width-2" name="nombre" id="nombre" placeholder="Nombre del procedimiento" autocomplete="off">
                              </div>
                          </div>

                          <!-- Estrategia -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la estrategia : </label>
                                  <select id="estrategia" name="estrategia" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>
                                      <?php
                                        $query = "SELECT * FROM estrategia;";

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
                          </div>

                          <!-- Lugar -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione el lugar : </label>
                                  <select id="lugar" name="lugar" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>
                                      <?php
                                        $query = "SELECT * FROM lugar;";

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
                          </div>

                          <!-- Carga -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Carga de trabajo en minutos : </label>
                                  <input type="text" class="form-control form-control-border border-width-2" name="carga" id="carga" placeholder="Duracion de trabajo en minutos" autocomplete="off">
                              </div>
                          </div>

                          <!-- Instrucciones -->
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="instrucciones">Ingrese el link de la hoja de ruta : </label>
                                  <input type="text" class="form-control form-control-border border-width-2" name="instrucciones" id="instrucciones" placeholder="Link de la hoja de ruta" autocomplete="off">
                              </div>
                          </div>

                          <!-- Leyes y normas -->
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="leynorma">Ingrese el link de las leyes y normas : </label>
                                  <input type="text" class="form-control form-control-border border-width-2" name="leynorma" id="leynorma" placeholder="Link de las leyes y normas" autocomplete="off">
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Eleccion de maquina parte y subparte -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Eleccion de la maquina, parte y subparte</h3>
                  </div>
                  <div class="card-body">
                      <div class="row">

                          <!-- Maquina -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la maquina : </label>
                                  <select id="idmaq" name="idmaq" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>
                                      <?php
                                        $query = "SELECT id_maq,nombre FROM maquina;";

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
                          </div>

                          <!-- Parte -->
                          <div class="col-lg-4  col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la parte : </label>
                                  <select id="idparte" name="idparte" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>

                                  </select>
                              </div>
                          </div>

                          <!-- Subparte -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la subparte : </label>
                                  <select id="idsubparte" name="idsubparte" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>

                                  </select>
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Eleccion del trabajador -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Eleccion del trabajador</h3>
                  </div>
                  <div class="card-body">
                      <div class="row">

                          <!-- Elegir trabajador -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione al trabajador : </label>
                                  <select id="trabajador" name="trabajador" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>
                                      <?php
                                        $query = "SELECT t_dni, concat(t_apelllido,', ' ,t_nombre) as nombreC from m_trabajador where t_estado = 1 AND t_profesion <> 1;";

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
                          </div>

                          <!-- Tabla de datos del trabajador -->
                          <div class="col-lg-8 col-sm-12">
                              <div class="row">
                                  <div class="col-lg-6 col-sm-12">
                                      <div class="form-group">
                                          <label for="dniT">DNI :</label>
                                          <input type="text" class="form-control form-control-border border-width-2" name="dniT" id="dniT" readonly autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-12">
                                      <div class="form-group">
                                          <label for="nombreT">Nombre del trabajador</label>
                                          <input type="text" class="form-control form-control-border border-width-2" name="nombreT" id="nombreT" readonly autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-12">
                                      <div class="form-group">
                                          <label for="ocupacionT">Ocupacion :</label>
                                          <input type="text" class="form-control form-control-border border-width-2" name="ocupacionT" id="ocupacionT" readonly autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-12">
                                      <div class="form-group">
                                          <label for="pagaT">Tipo de paga :</label>
                                          <input type="text" class="form-control form-control-border border-width-2" name="pagaT" id="pagaT" readonly autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Eleccion del herramientas -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Eleccion de maquinas/equipos, herramientas, EPIs y/o refacciones</h3>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12">
                              <div class="row">
                                  <div class="col-lg-3  col-sm-6">
                                      <button type="button" id="btnAgragarFila" class="btn btn-primary">Agregar fila </button>
                                  </div>
                                  <div class="col-lg-3 col-sm-6">
                                      <button type="button" id="btnEliminarFila" class="btn btn-danger">Eliminar fila</button>
                                  </div>
                              </div>
                              <hr><br>
                          </div>
                          <div class="col-11 offset-1">
                              <table class="table">
                                  <tr>
                                      <th>ID</th>
                                      <th>Nombre</th>
                                      <th>Costo</th>
                                      <th>Categoria</th>
                                      <th>Tipo</th>
                                      <th>Cantidad</th>
                                      <th>Costo total</th>
                                  </tr>
                              </table>
                          </div>
                          <div class="col-12" id="requerimiento">

                          </div>
                      </div>
                  </div>
                  <!-- /.card -->
              </div>

          </form>

          <!-- Guardar-->
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <button id="btnGuardar" class="btn btn-success">GUARDAR</button>
                  </div>
              </div>
              <!-- /.card -->
          </div>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modalCrear">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Agregar fila de requerimiento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row">

                      <div class="col-lg-12 col-sm-12">
                          <div class="form-group">
                              <label for="selecionBuscarElemento">Seleccione el elemento</label>
                              <select id="selecionBuscarElemento" name="selecionBuscarElemento" class="form-select select2" style="width: 100%;">
                                  <option value="o">Seleccione ...</option>
                                  <?php
                                    $query = "SELECT idinventario,nombre from inventario;";

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
                      </div>

                      <div class="col-lg-2 col-sm-12">
                          <div class="form-group">
                              <label for="idBuscarElemento">Id :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idBuscarElemento" id="idBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-10 col-sm-12">
                          <div class="form-group">
                              <label for="nombreBuscarElemento">Nombre :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreBuscarElemento" id="nombreBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                              <label for="categoriaBuscarElemento">Categoria :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="categoriaBuscarElemento" id="categoriaBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                              <label for="tipoBuscarElemento">Tipo :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="tipoBuscarElemento" id="tipoBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                              <label for="unidadBuscarElemento">Unidad :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="unidadBuscarElemento" id="unidadBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                              <label for="costoBuscarElemento">Costo :</label>
                              <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="costoBuscarElemento" id="costoBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                      <br>
                      <hr>
                      <br>

                      <div class="col-lg-12 col-sm-12">
                          <div class="form-group">
                              <label for="usarBuscarElemento">Cantidad a usar :</label>
                              <input type="text" class="form-control form-control-border border-width-2" name="usarBuscarElemento" id="usarBuscarElemento" autocomplete="off">
                          </div>
                      </div>

                  </div>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="btnModalAgregarFila" class="btn btn-primary">Agregar fila</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script src="dist/js/crearProcedimiento.js"></script>