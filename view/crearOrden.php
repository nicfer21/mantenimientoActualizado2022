  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>ORDEN DE TRABAJO - CREAR</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <form id="formGuardar" action="accion/guardarOrden.php" method="post">

              <!-- Buscar procedimiento -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Buscar procedimiento</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

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

                          <!-- Procedimiento -->
                          <div class="col-lg-10 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione el procedimiento : </label>
                                  <select id="idprocedimiento" name="idprocedimiento" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <option value="o">Seleccione ...</option>

                                  </select>
                              </div>
                          </div>

                          <!-- Buscar procedimiento -->
                          <div class="col-lg-2 col-sm-12">
                              <div class="form-group">
                                  <button type="button" id="btnBuscarProcedimiento" class="btn btn-secondary btn-block">
                                      Buscar Procedimiento
                                  </button>
                              </div>
                          </div>


                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Procedimiento -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Informacion del procedimiento</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">

                          <!-- Datos -->
                          <div class="col-lg-2 col-sm-12">
                              <div class="form-group">
                                  <label for="dataid">Nro de procedimiento : </label>
                                  <input type="text" name="dataid" id="dataid" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-10 col-sm-12">
                              <div class="form-group">
                                  <label for="datanombre">Procedimiento : </label>
                                  <input type="text" name="datanombre" id="datanombre" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 offset-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dataidmaquina">Id Maquina : </label>
                                  <input type="text" name="dataidmaquina" id="dataidmaquina" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-5 col-sm-12">
                              <div class="form-group">
                                  <label for="datamaquina">Maquina : </label>
                                  <input type="text" name="datamaquina" id="datamaquina" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 offset-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dataidparte">Id Parte : </label>
                                  <input type="text" name="dataidparte" id="dataidparte" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-5 col-sm-12">
                              <div class="form-group">
                                  <label for="dataparte">Parte : </label>
                                  <input type="text" name="dataparte" id="dataparte" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 offset-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dataidsubparte">Id Subparte : </label>
                                  <input type="text" name="dataidsubparte" id="dataidsubparte" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-5 col-sm-12">
                              <div class="form-group">
                                  <label for="datasubparte">Subparte : </label>
                                  <input type="text" name="datasubparte" id="datasubparte" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label for="dataestrategia">ACCION : </label>
                                  <input type="text" name="dataestrategia" id="dataestrategia" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="dataduracion">DURACION (min) : </label>
                                  <input type="text" name="dataduracion" id="dataduracion" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="datadni">DNI : </label>
                                  <input type="text" name="datadni" id="datadni" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-5 col-sm-12">
                              <div class="form-group">
                                  <label for="datatrabajador">NOMBRE : </label>
                                  <input type="text" name="datatrabajador" id="datatrabajador" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="dataprofesion">CARGO : </label>
                                  <input type="text" name="dataprofesion" id="dataprofesion" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-4 offset-lg-8 col-sm-12">
                              <div class="form-group">
                                  <label for="datalugar">LUGAR : </label>
                                  <input type="text" name="datalugar" id="datalugar" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="datainstruccion">HOJA DE RUTA : </label>
                                  <input type="text" name="datainstruccion" id="datainstruccion" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label for="dataley">LEY : </label>
                                  <input type="text" name="dataley" id="dataley" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>

                          <!-- Requerimientos -->
                          <div class="col-lg-12 col-sm-12">
                              <h5>Requerimientos</h5>
                              <div class="form-group">
                                  <table class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th>ID</th>
                                              <th>ELEMENTO</th>
                                              <th>CATEGORIA</th>
                                              <th>TIPO</th>
                                              <th>CANTIDAD</th>
                                              <th>UNIDAD</th>
                                              <th>COSTO DE REQUERIMIENTO</th>
                                          </tr>
                                      </thead>
                                      <tbody id="dataReq">

                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->





              </div>

              <!-- Buscar procedimiento -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Fecha de orden de trabajo</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">

                          <div class="col-lg-7 col-sm-12">
                              <div class="form-group">
                                  <label>Eleccion de fecha de inicio : </label>
                                  <div class="input-group date" id="calcularFecha" data-target-input="nearest">
                                      <input type="text" readonly class="form-control datetimepicker-input" data-target="#calcularFecha" />
                                      <div class="input-group-append" data-target="#calcularFecha" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                  <label for="fechaInicial">Fecha de apertura de orden : </label>
                                  <input type="text" name="fechaInicial" id="fechaInicial" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>

                          <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                  <label for="fechaFinal">Fecha estimada de cierre de orden : </label>
                                  <input type="text" name="fechaFinal" id="fechaFinal" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>

                      </div>
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Aprobado -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Generado por </h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">

                          <div class="col-lg-2 col-sm-12">
                              <div class="form-group">
                                  <label for="trabajador">ID : </label>
                                  <input type="text" name="trabajador" id="trabajador" value="<?php echo $_SESSION['usuario']; ?>" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Cargo : </label>
                                  <input type="text" value="<?php echo $_SESSION['profesion']; ?>" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                  <label>Nombre : </label>
                                  <input type="text" value="<?php echo $_SESSION['nombreC']; ?> " readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>

                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Prioridad y descripcion -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Prioridad y descripcion </h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">

                          <!-- Prioridad -->
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la prioridad : </label>
                                  <select id="prioridad" name="prioridad" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <?php
                                        $query = "SELECT * FROM prioridad;";

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
                                  <label>Descripcion de la orden de trabajo : </label>
                                  <textarea name="descripcion" id="descripcion"></textarea>
                              </div>
                          </div>

                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- btnGuardar -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Prioridad y descripcion </h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">

                          <div class="col-3">
                              <button type="button" id="btnGuardar" class="btn btn-success">Generar Orden</button>
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

  <script src="dist/js/crearOrden.js"></script>