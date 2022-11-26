  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>FICHA TECNICA </h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Ficha tecnica por maquina</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>

              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12 col-sm-12">
                          <table id="tablaFicha" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th>
                                          ID
                                      </th>
                                      <th>
                                          Marca
                                      </th>
                                      <th>
                                          Modelo
                                      </th>
                                      <th>
                                          Nombre
                                      </th>
                                      <th>
                                          Descripcion
                                      </th>
                                      <th>
                                          Ficha
                                      </th>
                                  </tr>
                              </thead>
                              <tbody id="table_trabajador_data">
                                  <?php

                                    $query = "SELECT * FROM maquina;";

                                    $rs = mysqli_query($con, $query);

                                    $rows = array();

                                    while ($row = mysqli_fetch_row($rs)) {
                                        $rows[] = $row;
                                    }

                                    foreach ($rows as $row) {
                                        echo "
                                                <tr>
                                                    <td class='dni'>$row[0]</td>
                                                    <td class='apellido'>$row[1]</td>
                                                    <td class='nombre'>$row[2]</td>
                                                    <td class='profesion'>$row[3]</td>
                                                    <td class='jornada'>$row[4]</td>
                                                    <td>
                                                    <a class='btn btn-link' href='$row[6]' target='_blank' >
                                                    <i class='fa fa-download' aria-hidden='true'></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                                ";
                                    }
                                    ?>
                              </tbody>
                              <tfoot>
                                  <th>
                                      ID
                                  </th>
                                  <th>
                                      Marca
                                  </th>
                                  <th>
                                      Modelo
                                  </th>
                                  <th>
                                      Nombre
                                  </th>
                                  <th>
                                      Descripcion
                                  </th>
                                  <th>
                                      Ficha
                                  </th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>

          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
      $(document).ready(function() {
          $("#tablaFicha").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#table_trabajador_wrapper .col-md-6:eq(0)');
      });
  </script>