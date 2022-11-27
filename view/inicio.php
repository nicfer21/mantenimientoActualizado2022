  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>INDICADORES MES ACTUAL : <?php
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
            <a href="listaSolicitud" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="listaOrden" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="listaReporteTrabajo" class="small-box-footer">Más Informacion <i class="fas fa-arrow-circle-right"></i></a>
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
              <p>Porcentaje de Cumplimiento</p>
            </div>
            <div class="icon">
              <i class="ion ion-speedometer"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->


      </div>
      <!-- /.row -->




      <div class="row">
        <!-- Graficos de datos -->
        <div class="col-lg-6 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Mantenimientos por maquina completados</h3>

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
      </div>



      <!-- Tarjeta de power bi -->
      <div class="row">
        <div class="col-lg-12">


          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Reporte en PowerBI </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>

            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-sm-12">

                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>


        </div>
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
                where procedimiento.idmaquina = '$maquinas[$i]' and month(reptrabajo.inicio) = month(now());";

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