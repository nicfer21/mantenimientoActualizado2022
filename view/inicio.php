  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inicio</h1>
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

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>

          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>

          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
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

        <div class="col-lg-3 col-6">
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





        <!-- Graficos de datos -->
        <div class="col-lg-6 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Mantenimientos por maquina completados : <?php
                                                                              date_default_timezone_set('America/Lima');
                                                                              echo date('F Y');

                                                                              ?></h3>

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
      <!-- /.row -->





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
              'rgba(255, 99, 132, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255, 205, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(153, 102, 255, 1)'
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