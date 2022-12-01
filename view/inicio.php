  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RESUMEN MES ACTUAL : <?php
                                      date_default_timezone_set('America/Lima');
                                      echo date('F - Y');
                                      ?> </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php
    $querySetZona = "Set time_zone='-5:00';";
    mysqli_query($con, $querySetZona);
    ?>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php
                $querySolicitudes = "SELECT count(idsolicitud) from solicitud where month(fecha) = month(now());";
                $rs = mysqli_query($con, $querySolicitudes);
                $row = mysqli_fetch_row($rs);

                echo $row[0];

                ?>
              </h3>

              <p>Solicitudes de trabajo</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>

            <?php if ($_SESSION['tipo']  != 3) {
              echo '<a href="listaSolicitud" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>';
            } ?>


          </div>
        </div>

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php
                $queryOrdenes = "SELECT count(idorden) FROM ordentrabajo  where month(inicio) = month(now());";
                $rs = mysqli_query($con, $queryOrdenes);
                $row = mysqli_fetch_row($rs);

                echo $row[0];
                $NumOrden = $row[0];

                ?>
              </h3>

              <p>Ordendes de trabajo</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>

            <?php if ($_SESSION['tipo']  != 3) {
              echo '<a href="listaOrden" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>';
            } ?>


          </div>
        </div>

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?php
                $queryReporte = "SELECT count(idreptrabajo) FROM reptrabajo  where month(inicio) = month(now());";
                $rs = mysqli_query($con, $queryReporte);
                $row = mysqli_fetch_row($rs);
                $NumReporte = $row[0];
                echo $NumReporte;
                ?>
              </h3>

              <p>Reportes de trabajo</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>

            <?php if ($_SESSION['tipo']  != 3) {
              echo ' <a href="listaReporteTrabajo" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>';
            } ?>

          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?php
                $Cumplimiento = ($NumReporte / $NumOrden) * 10000;
                $Cumplimiento = round($Cumplimiento) / 100;
                echo $Cumplimiento;
                ?>
                <sup style="font-size: 20px">%</sup>
              </h3>
              <p>Porcentaje de Cumplimiento de OT</p>
            </div>
            <div class="icon">
              <i class="ion ion-speedometer"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>

                <?php

                $queryHH = "SELECT sum(tiempo) from reptrabajo where month(inicio) = month(now());";
                $rs = mysqli_query($con, $queryHH);
                $row = mysqli_fetch_row($rs);
                $HorasHombre = ($row[0] / 60) * 100;
                $HorasHombre = round($HorasHombre) / 100;
                echo $HorasHombre;
                ?>

                HH</h3>

              <p>Horas Hombre empleadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3> S/.
                <?php
                $queryCostoMO = "SELECT sum((reptrabajo.tiempo * m_trabajador.t_tarifa)/60) from reptrabajo
                inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
                inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
                inner join m_trabajador on procedimiento.idtrabajador = m_trabajador.t_dni where month(reptrabajo.inicio) = month(now());";

                $rs = mysqli_query($con, $queryCostoMO);
                $row = mysqli_fetch_row($rs);

                $costoMO = $row[0];

                $queryCostoMat = "SELECT sum(costo) from materialuso
              inner join reptrabajo on materialuso.idreptrabajo = reptrabajo.idreptrabajo where month(reptrabajo.inicio) = month(now());";
                $rs = mysqli_query($con, $queryCostoMat);
                $row = mysqli_fetch_row($rs);

                $costoMat = $row[0];

                $costoTot = ($costoMat + $costoMO) * 100;
                $costoTot = round($costoTot) / 100;

                echo $costoTot;

                ?>
              </h3>

              <p>Costo de mantenimiento empleado</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->




      <div class="row">
        <!-- Tabla de ordenes en esta semana -->
        <div class="col-lg-6 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ordenes de trabajo para hoy :
                <?php
                echo date('d, F Y');
                ?>
              </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Orden de trabajo</th>
                    <th>Horario de inicio</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryOrdenHoy = "SELECT procedimiento.nombre,time(ordentrabajo.inicio), ordentrabajo.estado from ordentrabajo
                  inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
                  where date(ordentrabajo.inicio) = date(now()) order by ordentrabajo.inicio;";

                  $rs = mysqli_query($con, $queryOrdenHoy);

                  $rows = array();

                  while ($row = mysqli_fetch_row($rs)) {
                    $rows[] = $row;
                  }

                  foreach ($rows as $row) {
                    $estado = "";
                    if ($row[2] == 1) {
                      $estado = "
                      <div class='icon' style='color: red'>
                      Falta
                      <i class='fa fa-info-circle' aria-hidden='true' style='color: red'></i>
                      </div>";
                    } else {
                      $estado = "
                      <div class='icon' style='color: green'>
                      Completado 
                      <i class='fa fa-check-circle' aria-hidden='true' style='color: green'></i>
                      </div>";
                    }
                    echo "<tr>
                    <td>
                      $row[0]
                    </td>
                    <td>
                      $row[1]
                    </td>
                    <td>
                      $estado
                    </td>
                  </tr>";
                  }

                  ?>

                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- Graficos de datos -->
        <div class="col-lg-6 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Mantenimientos correctivos por maquina realizados</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <canvas id="graficoTiposMantenimiento">

              </canvas>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- Power BI -->
        <div class="col-lg-12 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Reporte en Power BI</h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <iframe title="Resumen Mantenimiento" width="924" height="600" src="https://app.powerbi.com/view?r=eyJrIjoiMDk2ZjQxZGItNTAwZC00NjZlLThhMTYtNWE2YTg0ZDNjZWMxIiwidCI6IjBjZDEzZTIzLTAyY2QtNDMxNi04YWZhLTY3MmE4OTM3NDQ3ZiJ9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    $(document).ready(function() {

      const graficoTiposMantenimiento = $("#graficoTiposMantenimiento");
      new Chart(graficoTiposMantenimiento, {
        type: 'bar',
        data: {
          labels: [
            <?php
            $maquinas = array('IMP_01', 'BOR_01', 'BCO_01', 'COS_01', 'REC_01', 'REM_01');

            for ($i = 0; $i < count($maquinas); $i++) {
              echo "'$maquinas[$i]',";
            }

            ?>
          ],

          datasets: [{
            label: 'Recuento',
            data: [
              <?php

              for ($i = 0; $i < count($maquinas); $i++) {

                $queryRecuentoMaquinas = "SELECT count(*)  from reptrabajo 
                inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
                inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento 
                where procedimiento.idmaquina = '$maquinas[$i]' and month(reptrabajo.inicio) = month(now()) and procedimiento.idestrategia = 1;";

                $rs = mysqli_query($con, $queryRecuentoMaquinas);

                $row = mysqli_fetch_row($rs);

                echo $row[0] . ",";
              }

              ?>
            ],
            borderWidth: 1,
            backgroundColor: [
              'rgba(255, 99, 132, 0.45)',
              'rgba(255, 159, 64, 0.45)',
              'rgba(255, 205, 86, 0.45)',
              'rgba(75, 192, 192, 0.45)',
              'rgba(54, 162, 235, 0.45)',
              'rgba(153, 102, 255, 0.45)'
            ],

          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });





    });
  </script>