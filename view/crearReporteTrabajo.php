  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>CREACION REPORTE DE TRABAJO</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <form action='accion/guardarRepTrabajo.php' id="formGuardar" method='post'>

              <!-- Buscar orden activa -->
              <div class="card">

                  <div class="card-header">
                      <h3 class="card-title">Elegir orden de trabajo activa</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label>Seleccione la orden activa : </label>
                                  <select id="idorden" name="idorden" class="form-control form-control-border border-width-2 custom-select" style="width: 100%;">
                                      <?php
                                        $query = "SELECT o.idorden,concat(date(o.inicio),' / ',time(o.inicio),' -> ',p.nombre) from ordentrabajo as o 
                                        inner join procedimiento as p on o.idprocedimiento = p.idprocedimiento 
                                        where o.estado = 1
                                        order by o.inicio ;";

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
                          <div class="col-lg-3 col-sm-12">
                              <div>
                                  <button type="button" id="btnBuscarOrden" class="btn btn-secondary btn-block">Buscar orden de trabajo</button>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Datos de la orden -->
              <div class="card">

                  <div class="card-header">
                      <h3 class="card-title">Datos de la orden de trabajo</h3>
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="dataid">Nro de OT : </label>
                                  <input type="text" name="dataid" id="dataid" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label for="datatitulo">Titulo de la Orden de trabajo : </label>
                                  <input type="text" name="datatitulo" id="datatitulo" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="datadni">DNI del encargado : </label>
                                  <input type="text" name="datadni" id="datadni" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                  <label for="datanombre">Nombre del encargado : </label>
                                  <input type="text" name="datanombre" id="datanombre" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="dataocupacion">Ocupacion del encargado : </label>
                                  <input type="text" name="dataocupacion" id="dataocupacion" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="datainicio">Fecha y hora de inicio : </label>
                                  <input type="text" name="datainicio" id="datainicio" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-4 col-sm-12">
                              <div class="form-group">
                                  <label for="datafinal">Fecha y hora de finalizado : </label>
                                  <input type="text" name="datafinal" id="datafinal" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                          <div class="col-lg-4 offset-lg-4 col-sm-12">
                              <button type="button" id="btnInfo" class="btn btn-block btn-secondary">Mas Informacion de la orden</button>
                          </div>

                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Comienzo y fin  -->
              <div class="card">

                  <div class="card-header">
                      <h3 class="card-title">Seleccionar la fecha y horario de comienzo y fin del trabajo</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label>Fecha y hora de inicio : </label>
                                  <div class="input-group date" id="fechaInicio" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#fechaInicio" />
                                      <div class="input-group-append" data-target="#fechaInicio" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label>Fecha y hora de culminacion : </label>
                                  <div class="input-group date" id="fechaFinal" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input" data-target="#fechaFinal" />
                                      <div class="input-group-append" data-target="#fechaFinal" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <button type="button" id="btnCalcularHora" class="btn btn-secondary btn-block">Calcular el tiempo</button>
                              </div>
                          </div>
                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="tiempoTrabajo">Tiempo de trabajo real (min) : </label>
                                  <input type="text" name="tiempoTrabajo" id="tiempoTrabajo" readonly class="form-control form-control-border border-width-2">
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Reeleccion de materiales  -->
              <div class="card">

                  <div class="card-header">
                      <h3 class="card-title">Elegir orden de trabajo activa</h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">
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
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Observaciones  -->
              <div class="card">

                  <div class="card-header">
                      <h3 class="card-title">Observaciones en el trabajo </h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                      </div>

                  </div>
                  <div class="card-body">
                      <div class="row">
                          <!-- Descripcion -->
                          <div class="col-lg-12 col-sm-12">
                              <div class="form-group">
                                  <label>Anotar detalladamente las observaciones : </label>
                                  <textarea name="descripcion" id="descripcion">

                                  
<h1>OBSERVACIONES</h1><p><br></p><p><br></p><p>_____________________________________________________________________________________________________________________________________________________</p><h1>INSPECCION DE CALIDAD</h1><table class="table table-bordered"><tbody><tr><td><p>1. ¿LAS HERRAMIENTAS DE TRABAJO SE ENCUENTRAN EN BUEN ESTADO PARA SU USO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO</td><td>b) 30% DE CUMPLIMIENTO</td><td>c) 65% DE CUMPLIMIENTO</td><td>d) 95% DE CUMPLIMIENTO</td></tr></tbody></table><p>2. ¿LAS MAQUINAS ESTAN LIBRES DE OBJETOS INNECESARIOS?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>3. ¿LAS REFACCIONES SE ENCUENTRAN LIMPIAS Y EN BUEN ESTADO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>4. SE USA DE MANERA ADECUADA LAS INDUMENTARIAS DE SEGURIDAD?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>5. ¿EXISTE ORDEN EN EL AREA DE MANTENIMIENTO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>6. ¿EXISTE LIMPIEZA EN EL AREA DE MANTENIMIENTO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>7. SE RESPETAN LAS LEYES Y NORMAS DE TRABAJO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>8. ¿SE ESTA OBEDECIENDO CON EL CALENDARIO DE MANTENIMIENTO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>9. ¿LAS MAQUINAS ESTAN DEBIDAMENTE IDENTIFICADAS Y PUESTAS EN SU LUGAR DE TRABAJO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>10. ¿LOS PLANES DE ORDEN Y LIMPIEZA SE ESTAN REALIZANDO DE MANERA CORRECTA EN EL AREA DE MANTENIMIENTO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>11.¿ LOS TECNICOS Y OPERARIOS ENCARGADOS DEL MANTENIMIENTO EN LA EMPRESA HACEN SU TRABAJO A TIEMPO Y CUMPLEN CON EL PROTOCOLO ESTABLECIDO?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p>12. ¿SE CUMPLEN CON LAS CAPACITACIONES ESTABLECIDAS?</p><table class="table table-bordered"><tbody><tr><td>a) NO HAY CUMPLIMIENTO<br></td><td>b) 30% DE CUMPLIMIENTO<br></td><td>c) 65% DE CUMPLIMIENTO<br></td><td>d) 95% DE CUMPLIMIENTO<br></td></tr></tbody></table><p><br></p></td></tr><tr><td><br></td></tr><tr><td><br></td></tr><tr><td><br></td></tr></tbody></table><p><br></p>

                                  </textarea>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>

              <!-- Guardar -->
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-3">
                              <button type="button" id="btnGuardar" class="btn btn-success btn-block">Guardar Reporte de Trabajo</button>
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

  <!-- modal imprimir-->
  <div class="modal fade" id="modalImprimir">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Imprimir orden de trabajo</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action='accion/imprimirOrden.php' method='post' target='_blank'>
                  <div class="modal-body">
                      <div class="row">

                          <div class="col-lg-3 col-sm-12">
                              <div class="form-group">
                                  <label for="idImprimir">ID Orden de trabajo :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="idImprimir" id="idImprimir" autocomplete="off">
                              </div>
                          </div>
                          <div class="col-lg-9 col-sm-12">
                              <div class="form-group">
                                  <label for="nombreImprimir">Titulo de orden de trabajo :</label>
                                  <input type="text" readonly class="form-control form-control-border border-width-2" readonly name="nombreImprimir" id="nombreImprimir" autocomplete="off">
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" name="btnImprimir" class="btn btn-primary">Imprimir Orden de trabajo</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


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

  <script src="dist/js/crearReporteTrabajo.js"></script>