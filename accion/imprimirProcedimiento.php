<?php

if (isset($_POST['idImprimir'])) {

    $id = $_POST['idImprimir'];

    $con = mysqli_connect("mantenimiento.cjedgm57ynt9.sa-east-1.rds.amazonaws.com", "admin", "mantenimiento", "sys");

    $query2 = "SELECT 
                        procedimiento.idprocedimiento,
                        procedimiento.nombre,
                        maquina.id_maq, 
                        maquina.nombre,
                        parte.id_parte,
                        parte.parte,
                        subparte.id_subparte,
                        subparte.subparte,
                        estrategia.nombre,
                        procedimiento.cargalab,
                        m_trabajador.t_dni,
                        concat(m_trabajador.t_apelllido, ', ', m_trabajador.t_nombre),
                        m_trabajador.t_tarifa,
                        lugar.nombre,
                        procedimiento.instruccion,
                        procedimiento.ley
                        FROM 
                        ((((((procedimiento inner join maquina on procedimiento.idmaquina = maquina.id_maq)
                        inner join parte on procedimiento.idparte = parte.id_parte)
                        inner join subparte on procedimiento.idsubparte = subparte.id_subparte)
                        inner join estrategia on procedimiento.idestrategia = estrategia.idestrategia)
                        inner join m_trabajador on procedimiento.idtrabajador = m_trabajador.t_dni)
                        inner join lugar on procedimiento.idlugar = lugar.idlugar) where procedimiento.idprocedimiento = $id;";

    $rs = mysqli_query($con, $query2);

    $row = mysqli_fetch_row($rs);

    $id = $row[0];
    $titulo = $row[1];
    $idmaq = $row[2];
    $maq = $row[3];
    $idpar = $row[4];
    $par = $row[5];
    $idsub = $row[6];
    $sub = $row[7];
    $estrategia  = $row[8];
    $carga = $row[9];
    $dni  = $row[10];
    $nombre  = $row[11];
    $tarifa  = $row[12];
    $lugar  = $row[13];
    $instruccion  = $row[14];
    $ley  = $row[15];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Procedimiento Nro <?php echo $id; ?> </title>
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
                    <h1>Procedimiento de trabajo Nro <<?php echo $id; ?>>
                    </h1>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>INFORMACION DEL PROCEDIMIENTO : </h6>
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
                        <label for="nombre">TITULO : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $titulo; ?>">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label for="nombre">DURACION : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $carga . " minutos"; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>ESTRATEGIA : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $estrategia; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>LUGAR : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $lugar; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>INSTRUCCIONES : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $instruccion; ?>">
                    </div>
                    <div id="instrucciones"></div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                        <label>GUIA NORMATIVAS : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $ley; ?>">
                    </div>
                    <div id="leyes"></div>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>RESPONSABLE : </h6>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="form-group">
                        <label>DNI : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $dni; ?>">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="form-group">
                        <label>NOMBRE : </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $nombre; ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>COSTO MANO DE OBRA: </label>
                        <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php $costoM = ($carga / 60) * $tarifa * 100;
                                                                                                                    $costoM = round($costoM) / 100;
                                                                                                                    echo $costoM; ?>">
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
                <div class="col-lg-8 offset-lg-2  col-sm-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">DESCRIPCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">MAQUINA</th>
                                <td><?php echo $idmaq; ?></td>
                                <td><?php echo $maq; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">PARTE</th>
                                <td><?php echo $idpar; ?></td>
                                <td><?php echo $par; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">SUBPARTE</th>
                                <td><?php echo $idsub; ?></td>
                                <td><?php echo $sub; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>REQUERIMIENTOS : </h6>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>Categoria</th>
                            <th>ID Inventario</th>
                            <th>Elemento</th>
                            <th>Cantidad</th>
                            <th>Costo unitario</th>
                            <th>Tipo</th>
                            <th>Unidad</th>
                            <th>Costo Requerimiento</th>
                        </thead>
                        <tbody>

                            <?php

                            $costoT = 0;

                            $query = "SELECT 
                            categoria.nombre,
                            inventario.idinventario,
                            inventario.nombre,
                            requisito.cantidad,
                            inventario.costou,
                            tipo.nombre,
                            unidad.nombre,
                            requisito.costo
                            FROM 
                            ((((requisito inner join inventario on requisito.idinventario = inventario.idinventario) inner join tipo on inventario.idtipo = tipo.idtipo) 
                            inner join fabricante on inventario.idfabricante = fabricante.idfabricante)
                            inner join categoria on inventario.idcategoria = categoria.idcategoria)
                            inner join unidad on inventario.idunidad = unidad.idunidad
                            where idprocedimiento = $id order by categoria.idcategoria;";

                            $rs = mysqli_query($con, $query);

                            $rows = array();

                            while ($row = mysqli_fetch_row($rs)) {
                                $rows[] = $row;
                            }

                            foreach ($rows as $row) {

                                $costoT = $costoT + $row[7];

                                echo "
                            <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>S/ $row[4]</td>
                                <td>$row[5]</td>
                                <td>$row[6]</td>
                                <th>S/ $row[7]</th>
                            </tr>
  ";
                            }

                            ?>
                            <tr>
                                <th colspan="8">SUBTOTALES : </th>
                            </tr>
                            <?php

                            $costoT = $costoT + $costoM;

                            $categoria = array("MAQUINA O EQUIPO", "HERRAMIENTA", "REFACCION", "INSUMO", "EPPS");

                            for ($k = 0; $k < 5; $k++) {

                                $etapa = $k + 1;

                                $query5 = "SELECT
                                sum(requisito.costo)
                                FROM requisito inner join inventario on requisito.idinventario = inventario.idinventario 
                                where idprocedimiento = $id and inventario.idcategoria = $etapa;";

                                $rs = mysqli_query($con, $query5);
                                $row = mysqli_fetch_row($rs);

                                if ($row[0] == "") {
                                    $row = "-";
                                } else {
                                    $row = "S/ " . $row[0];
                                }

                                echo "
                                <tr>
                                    <th colspan='7'>$categoria[$k]</th>
                                    <th>$row</th>
                                </tr>
                                ";
                            }


                            ?>

                            <tr>
                                <th colspan="7">MANO DE OBRA</th>
                                <th><?php echo "S/ " . $costoM; ?></th>
                            </tr>
                            <tr>
                                <th colspan="8">COSTO TOTAL DE : S/ <?php echo $costoT; ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>

                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                        <h6>RESUMEN : </h6>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-2 col-sm-12">
                    <p>El costo total del procedimiento es de <strong>S/ <?php echo $costoT; ?></strong> y con una duracion aproximada de <strong><?php echo  $carga; ?> minutos.</strong></p>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <hr>
                </div>


            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js" integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../plugins/qrcodes/qrcodes.js"></script>
        <script>
            $(document).ready(function() {

                var qrcode1 = new QRCode("instrucciones", {
                    text: "<?php echo $instruccion; ?>",
                    width: 200,
                    height: 200,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });

                var qrcode2 = new QRCode("leyes", {
                    text: "<?php echo $ley; ?>",
                    width: 200,
                    height: 200,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });

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