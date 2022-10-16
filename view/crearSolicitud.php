  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>SOLICITUD DE TRABAJO - CREAR</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <form id="formGuardar" action="accion/guardarSolicitud.php" method="post">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Crear solicitud</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="row">

                          <!-- titulo -->
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="titulo">Titulo de la solicitud : </label>
                                  <input type="text" class="form-control form-control-border border-width-2" name="titulo" id="titulo" placeholder="Titulo de la solicitud" autocomplete="off">
                              </div>
                          </div>

                          <!-- Trabajador -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="id">DNI del trabajador : </label>
                                  <input type="text" value=" <?php echo $_SESSION['usuario'];  ?> " class="form-control form-control-border border-width-2" readonly name="id" id="id" autocomplete="off">
                              </div>
                          </div>
                          <div class="col-lg-8 col-sm-12">
                              <div class="form-group">
                                  <label for="nombreTrabajador">Nombre del trabajador : </label>
                                  <input type="text" value=" <?php echo  $_SESSION['nombre'];  ?> " class="form-control form-control-border border-width-2" readonly name="nombreTrabajador" id="nombreTrabajador" autocomplete="off">
                              </div>
                          </div>

                          <!-- Maquina -->
                          <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la maquina : </label>
                                  <select id="maquina" name="maquina" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>
                                      <?php
                                        $query = "SELECT * FROM maquina;";

                                        $rs = mysqli_query($con, $query);

                                        $rows = array();

                                        while ($row = mysqli_fetch_row($rs)) {
                                            $rows[] = $row;
                                        }

                                        foreach ($rows as $row) {
                                            echo "
                                        <option value='$row[0]'>$row[3]</option>
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

                          <!-- Descripcion -->
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="descripcion">Descripcion : </label>
                                  <textarea name="descripcion" id="descripcion"></textarea>
                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                  <button id="btnGuardar" name="btnGuardar" class="btn btn-success" type="button">
                                      Guardar
                                  </button>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
          </form>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="dist/js/crearSolicitud.js"></script>