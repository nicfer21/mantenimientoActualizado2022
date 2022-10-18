<?php

if (isset($_POST['idSolicitud'])) {
    $id = $_POST['idSolicitud'];

    $con = mysqli_connect("mantenimiento.cjedgm57ynt9.sa-east-1.rds.amazonaws.com", "admin", "mantenimiento", "sys");

    $query0 = "UPDATE solicitud
    SET
    estado = 0
    WHERE idsolicitud = $id;";

    mysqli_query($con,$query0);


    
    $query1 = "Set time_zone = '-05:00';";

    mysqli_query($con, $query1);

    $query2 = "SELECT solicitud.idsolicitud,solicitud.titulo,m_trabajador.t_dni,
    concat(m_trabajador.t_apelllido,', ',m_trabajador.t_nombre) as nombre, m_profesion.p_prof,
    maquina.id_maq ,maquina.nombre,lugar.nombre,date(fecha),time(fecha),
    solicitud.texto
    from (((solicitud inner join m_trabajador on solicitud.idtrabajador = m_trabajador.t_dni)
    inner join maquina on solicitud.idmaq = maquina.id_maq)
    inner join lugar on solicitud.idlugar = lugar.idlugar)
    inner join m_profesion on m_trabajador.t_profesion = m_profesion.p_id where solicitud.idsolicitud = $id;";

    $rs = mysqli_query($con, $query2);

    $row = mysqli_fetch_row($rs);

    $titulo = $row[1];
    $dni = $row[2];
    $nombre = $row[3];
    $profesion = $row[4];
    $idmaq = $row[5];
    $nombremaq = $row[6];
    $lugar = $row[7];
    $fecha  = $row[8];
    $hora = $row[9];
    $texto  = $row[10];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Solicitud Nro <?php echo $id; ?> </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <div class="row m-5">
                <div class="col-sm-3">
                    <button type="button" id="btnImprimir" class="btn btn-primary">
                        Imprimir
                    </button>
                </div>
            </div>

            <div id="AREA" class="row m-1">

                <div class="col-lg-12 col-sm-12 text-center">
                    <h1>Solicitud de orden de trabajo Nro <<?php echo $id; ?>>
                    </h1>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>INFORMACION GENERALES : </h6>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">TITULO : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $titulo; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>FECHA DE CREACION : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $fecha; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>HORA DE CREACION : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $hora; ?>">
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>RESPONSABLE : </h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label>DNI : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $dni; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>NOMBRE : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $nombre; ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>CARGO : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $profesion; ?>">
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>OBJETO : </h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label>ID : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $idmaq; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>MAQUINA : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $nombremaq; ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>LUGAR : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $lugar; ?>">
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>DESCRIPCION : </h6>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <?php echo $texto; ?>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js" integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {

                $("#btnImprimir").click(function(e) {
                    $.print("#AREA");
                });

            });
        </script>

    </body>

    </html>


<?php

}
?>