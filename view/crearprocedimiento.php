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
                      <div class="col-lg-6 col-sm-12">
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
                      <div class="col-lg-6 col-sm-12">
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

          <!-- Eleccion de subparte -->
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

                  </div>
              </div>
              <!-- /.card -->
          </div>

          <!-- Eleccion del trabajador -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Eleccion de maquinas, equipos, herramientas, EPIs y/o refacciones</h3>
              </div>
              <div class="card-body">
                  <div class="row">

                  </div>
              </div>
              <!-- /.card -->
          </div>

          <!-- Eleccion de subparte -->
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

  <script src="dist/js/crearProcedimiento.js"></script>