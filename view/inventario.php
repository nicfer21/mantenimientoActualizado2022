  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>INVENTARIO DE MANTENIMIENTO</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Tabla inventario -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><strong>LISTADO</strong></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <table id="tablaInventario" class="table table-bordered table-hover" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>COSTO</th>
                    <th>CANTIDAD</th>
                    <th>TIPO</th>
                    <th>FABRICANTE</th>
                    <th>PROVEEDOR</th>
                    <th>CATEGORIA</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>COSTO</th>
                    <th>CANTIDAD</th>
                    <th>TIPO</th>
                    <th>FABRICANTE</th>
                    <th>PROVEEDOR</th>
                    <th>CATEGORIA</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <!-- Creacion -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><strong>CONFIGURACION</strong></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <button type="button" id="btnCrearInventario" class="btn btn-success" data-toggle='modal' data-target='#modalCrear'>AGREGAR NUEVO ELEMENTO</button>
              </div>
              <hr>
            </div>
<!-- Falta actualizar
            <div class="col-6">
              <h5><strong>Actualizar</strong></h5>
            </div>
            <div class="col-6">
              <div class="form-group">
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                  <input type="checkbox" class="custom-control-input" id="switchActualizar">
                  <label class="custom-control-label" for="switchActualizar">Activar</label>
                </div>
              </div>
            </div>
-->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.content -->

    </section>
    <!-- /.content -->

    <!-- Modal Crear -->
    <div class="modal fade" id="modalCrear">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Agregar nuevo elemento</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <label for="nombreInventario">Ingrese el nombre :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="nombreInventario" id="nombreInventario" placeholder="Nombre del elemento" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="cantidadInventario">Ingrese la cantidad inicial :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="cantidadInventario" id="cantidadInventario" placeholder="Cantidad inicial" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="costoInventario">Ingrese el costo unitario o costo/hora :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fw-bold">
                            S/.
                          </span>
                        </div>
                        <input type="text" class="form-control" name="costoInventario" id="costoInventario" placeholder="Costo unitario del elemento" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="fabricanteInventario">Seleccione el fabricante:</label>
                      <select id="fabricanteInventario" name="fabricanteInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM fabricante order by nombre asc;";

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

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="proveedorInventario">Seleccione el proveedor:</label>
                      <select id="proveedorInventario" name="proveedorInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM proveedor order by nombre asc;";

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

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="categoriaInventario">Seleccione el categoria:</label>
                      <select id="categoriaInventario" name="categoriaInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM categoria;";

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

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="tipoInventario">Seleccione el tipo:</label>
                      <select id="tipoInventario" name="tipoInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM tipo;";

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

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnTrabajadorCrear" class="btn btn-primary">Guardar datos</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Actualizar -->
    <div class="modal fade" id="modalActualizar">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Actualizar elementos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="row">

                  <div class="col-lg-3 col-sm-12">
                    <div class="form-group">
                      <label for="idActInventario">ID :</label>
                      <input type="text" class="form-control form-control-border border-width-2" readonly name="idActInventario" id="idActInventario" placeholder="Id del elemento" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-9 col-sm-12">
                    <div class="form-group">
                      <label for="nombreActInventario">Ingrese el nombre :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="nombreActInventario" id="nombreActInventario" placeholder="Nombre del elemento" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="cantidadActInventario">Ingrese la cantidad inicial :</label>
                      <input type="text" class="form-control form-control-border border-width-2" name="cantidadActInventario" id="cantidadActInventario" placeholder="Cantidad inicial" autocomplete="off">
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="costoActInventario">Ingrese el costo unitario :</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text fw-bold">
                            S/.
                          </span>
                        </div>
                        <input type="text" class="form-control" name="costoActInventario" id="costoActInventario" placeholder="Costo unitario del elemento" autocomplete="off">
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="fabricanteActInventario">Seleccione el fabricante:</label>
                      <select id="fabricanteActInventario" name="fabricanteActInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM fabricante;";

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

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="proveedorActInventario">Seleccione el proveedor:</label>
                      <select id="proveedorActInventario" name="proveedorActInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM proveedor;";

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

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="categoriaActInventario">Seleccione el categoria:</label>
                      <select id="categoriaActInventario" name="categoriaActInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM categoria;";

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

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label for="tipoActInventario">Seleccione el tipo:</label>
                      <select id="tipoActInventario" name="tipoActInventario" class="custom-select form-control-border border-width-2" style="width: 100%;">
                        <?php
                        $query = "SELECT * FROM tipo;";

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

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" id="btnTrabajadorActualizar" class="btn btn-warning">Actualizar datos</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </div>
  <!-- /.content-wrapper -->



  <script src="dist/js/inventario.js"></script>