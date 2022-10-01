  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>MAQUINAS, PARTES Y SUBPARTES</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Busqueda -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Busqueda de partes y subpartes por maquina</h3>
              </div>
              <div class="card-body">

                  <div class="row">
                      <div class="col-lg-4 col-sm-12">
                          <div class="form-group">
                              <label for="cbxBuscar">Seleccione la maquina :</label>
                              <select name="cbxBuscar" id="cbxBuscar" class="custom-select rounded-0">
                                  <?php
                                    $query = "SELECT id_maq, nombre from sys.maquina order by nombre;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "<option value='$row[0]'>$row[1]</option>";
                                    }
                                    ?>
                              </select>
                              <button id="btnBuscar" name="btnBuscar" class="btn btn-info m-2">
                                  Buscar
                              </button>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Maquina -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>INFORMACION DE LA MAQUINA</strong></h3>
                  
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th class="col-lg-2">ID Maquina</th>
                                      <th class="col-lg-2">Marca</th>
                                      <th class="col-lg-2">Modelo</th>
                                      <th class="col-lg-5">Nombre</th>
                                  </tr>
                              </thead>
                              <tbody id="tablaMaquinasInfo">

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Partes -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>INFORMACION DE LAS PARTES</strong></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th class="col-lg-1">ID Parte</th>
                                      <th class="col-lg-2">Parte</th>
                                  </tr>
                              </thead>
                              <tbody id="tablaPartesInfo">

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- SUbpartes -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>INFORMACION DE LAS SUBPARTES</strong></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th class="col-lg-2">ID Parte</th>
                                      <th class="col-lg-4">Parte</th>
                                      <th class="col-lg-2">ID Subparte</th>
                                      <th class="col-lg-4">Sub parte</th>
                                  </tr>
                              </thead>
                              <tbody id="tablaSubpartesInfo">

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script src="dist/js/maquinapartes.js"></script>