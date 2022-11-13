  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>CATEGORIAS DEL INVENTARIO</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Fabricante -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>FABRICANTES</strong></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">

                      <div class="col-lg-6 col-sm-12">
                          <table id="tabla_fabricante" class="table table-bordered table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>ID Fabricante</th>
                                      <th>Nombre</th>
                                  </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID Fabricante</th>
                                      <th>Nombre</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="row">
                              <div class="col-lg-6 col-sm-12">
                                  <h5>Configuracion: </h5>
                              </div>
                              <div class="d-grid gap-2 col-lg-6 col-sm-12 mx-auto">
                                  <div class="form-group">
                                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                          <input type="checkbox" class="custom-control-input" id="switchFabricante">
                                          <label class="custom-control-label" for="switchFabricante">Actualizar</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">

                                  <div class="form-group row">
                                      <label for="idFabricante" class="col-sm-2 col-form-label">ID</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="idFabricante" placeholder="ID Fabricante" readonly>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="nombreFabricante" class="col-sm-2 col-form-label">Nombre</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="nombreFabricante" placeholder="Nombre del Fabricante">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <button type="button" id="btnActualizarFabricante" class="btn btn-warning">Actualizar</button>
                                      <button type="button" id="btnCrearFabricante" class="btn btn-success float-right">Crear</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Proveedor -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>PROVEEDORES</strong></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">

                      <div class="col-lg-6 col-sm-12">
                          <table id="tabla_proveedor" class="table table-bordered table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>ID Proveedor</th>
                                      <th>Nombre</th>
                                  </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID Proveedor</th>
                                      <th>Nombre</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="row">
                              <div class="col-lg-6 col-sm-12">
                                  <h5>Configuracion: </h5>
                              </div>
                              <div class="d-grid gap-2 col-lg-6 col-sm-12 mx-auto">
                                  <div class="form-group">
                                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                          <input type="checkbox" class="custom-control-input" id="switchProveedor">
                                          <label class="custom-control-label" for="switchProveedor">Actualizar</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">

                                  <div class="form-group row">
                                      <label for="idProveedor" class="col-sm-2 col-form-label">ID</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="idProveedor" placeholder="ID Proveedor" readonly>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="nombreProveedor" class="col-sm-2 col-form-label">Nombre</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="nombreProveedor" placeholder="Nombre del proveedor">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <button type="button" id="btnActualizarProveedor" class="btn btn-warning">Actualizar</button>
                                      <button type="button" id="btnCrearProveedor" class="btn btn-success float-right">Crear</button>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Categoria -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>CATEGORIAS</strong></h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">

                      <div class="col-lg-6 col-sm-12">
                          <table id="tabla_categoria" class="table table-bordered table-hover" width="100%">
                              <thead>
                                  <tr>
                                      <th>ID Categoria</th>
                                      <th>Nombre</th>
                                  </tr>
                              </thead>
                              <tbody>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>ID Categoria</th>
                                      <th>Nombre</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>

                      <div class="col-lg-6 col-sm-12">
                          <div class="row">
                              <div class="col-lg-6 col-sm-12">
                                  <h5>Configuracion: </h5>
                              </div>
                              <div class="d-grid gap-2 col-lg-6 col-sm-12 mx-auto">
                                  <div class="form-group">
                                      <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                          <input type="checkbox" class="custom-control-input" id="switchCategoria">
                                          <label class="custom-control-label" for="switchCategoria">Actualizar</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">

                                  <div class="form-group row">
                                      <label for="idCategoria" class="col-sm-2 col-form-label">ID</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="idCategoria" placeholder="ID Categoria" readonly>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="nombreCategoria" class="col-sm-2 col-form-label">Nombre</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" id="nombreCategoria" placeholder="Nombre del Categoria">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <button type="button" id="btnActualizarCategoria" class="btn btn-warning">Actualizar</button>
                                      <button type="button" id="btnCrearCategoria" class="btn btn-success float-right">Crear</button>
                                  </div>
                              </div>
                          </div>
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

  <script src="dist/js/categoria.js"></script>