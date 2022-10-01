  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>COMPRAS</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Compra-->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>COMPRAR</strong></h3>

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
                              <select id="elementoCompra" name="elementoCompra" class="form-select select2" style="width: 100%;">
                                  <option value="p">Seleccione ...</option>
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
                          <!-- /.form-group -->

                      </div>

                      <div class="col-lg-3 col-sm-6">
                          <div class="form-group">
                              <input type="text"  class="form-control form-control-border border-width-2" name="cantidadCompra" id="cantidadCompra" placeholder="Cantidad a comprar" autocomplete="off">
                          </div>
                      </div>

                      <div class="col-lg-2 col-sm-6">
                          <button id="btnAgregar" class="btn btn-success">AGREGAR</button>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>

          <!-- Tabla compras -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>LISTA DE COMPRAS</strong></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-12">
                          <table id="tablaCompra" class="table table-bordered table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>ELEMENTO</th>
                                      <th>CANTIDAD</th>
                                      <th>FECHA</th>
                                      <th>HORA</th>
                                  </tr>
                              </thead>
                              <tbody>

                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID</th>
                                      <th>ELEMENTO</th>
                                      <th>CANTIDAD</th>
                                      <th>FECHA</th>
                                      <th>HORA</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <script src="dist/js/compra.js"></script>