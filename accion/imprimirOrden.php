<?php

if (isset($_POST['idImprimir'])) {

    $id = $_POST['idImprimir'];

    $con = mysqli_connect("mantenimiento.cjedgm57ynt9.sa-east-1.rds.amazonaws.com", "admin", "mantenimiento", "sys");

    $query2 = "call mostrar_orden_estado($id);";

    $rs = mysqli_query($con, $query2);

    $row = mysqli_fetch_row($rs);

    $id = $row[0];
    $idProc = $row[1];
    $titulo = $row[2];
    $cargalab = $row[3];
    $inicio = $row[4];
    $final = $row[5];
    $prioridad = $row[6];
    $estado = $row[7];
    $descripcion  = $row[8];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orden de trabajo Nro <?php echo $id; ?> </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <div class="row m-5">
                <div class="col-sm-3 col-lg-3">
                    <button type="button" id="btnImprimir" class="btn btn-primary">
                        Imprimir orden de trabajo
                    </button>
                </div>

                <div class="col-sm-9 col-lg-9">
                    <div class="row">
                        <form action='imprimirProcedimiento.php' method='post' target='_blank'>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" readonly id="idImprimir" name="idImprimir" class="form-control" value="<?php echo $idProc; ?>">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button type="submit" id="btnImprimir" class="btn btn-secondary">
                                        Imprimir procedimiento
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div id="AREA" class="row m-1">

                <div class="col-lg-12 col-sm-12 text-center">
                    <h1>Orden de trabajo Nro <<?php echo $id; ?>>
                    </h1>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>INFORMACION DE LA ORDEN DE TRABAJO : </h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">ID : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">TITULO DE LA ORDEN DE TRABAJO : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $titulo; ?>">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">DURACION : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $cargalab . " minutos"; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>INICIO : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $inicio; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>FINAL : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $final; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>PRIORIDAD : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $prioridad; ?>">
                    </div>
                    <div id="instrucciones"></div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>ESTADO : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $estado; ?>">
                    </div>
                    <div id="leyes"></div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>DESCRIPCION DE LA ORDEN : </h6>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <?php echo $descripcion; ?>
                </div>

            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js" integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../plugins/qrcodes/qrcodes.js"></script>

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