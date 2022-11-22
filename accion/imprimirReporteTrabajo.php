<?php

include("coneccion.php");

if (isset($_POST['idImprimir'])) {

    $id = $_POST['idImprimir'];

    



}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Trabajo Nro <?php echo $id; ?> </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row m-5">
            <div class="col-sm-3 col-lg-3">
                <button type="button" id="btnImprimir" class="btn btn-primary">
                    Imprimir Reporte de trabajo
                </button>
            </div>

        </div>

        <div id="AREA" class="row m-1">

            <div class="col-lg-12 col-sm-12 text-center">
                <h1>Reporte de trabajo Nro <<?php echo $id; ?>>
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
                <form action='imprimirOrden.php' id="formOrden" method='post' target='_blank'>
                    <div class="form-group">
                        <label for="idImprimir">ID : </label>
                        <input type="text" name="idImprimir" readonly class="form-control form-control-border border-width-2" value="<?php echo $id; ?>">
                    </div>
                </form>
            </div>

            <div class="col-lg-2 col-sm-12">
                <button type="button" id="btnOrden" class="btn btn-secondary btn-block">
                    Imprimir Orden de trabajo
                </button>
            </div>

            <div class="col-lg-8 col-sm-12">
                <div class="form-group">
                    <label for="nombre">TITULO DE LA ORDEN DE TRABAJO : </label>
                    <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $titulo; ?>">
                </div>
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

            $("#btnOrden").click(function(e) {
                e.preventDefault();
                $("#formOrden").submit();
            });

        });
    </script>
</body>

</html>