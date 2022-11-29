<?php

include("coneccion.php");

if (isset($_POST['idImprimir'])) {

    $id = $_POST['idImprimir'];


    $query0 = "SELECT maquina.id_maq,maquina.nombre,parte.id_parte,parte.parte,subparte.id_subparte,subparte.subparte,procedimiento.nombre,reptrabajo.observacion 
    from reptrabajo
    inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
    inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
    inner join maquina on procedimiento.idmaquina = maquina.id_maq
    inner join parte on procedimiento.idparte = parte.id_parte
    inner join subparte on procedimiento.idsubparte = subparte.id_subparte
    where idreptrabajo = $id;";

    $rs0 = mysqli_query($con, $query0);

    $row = mysqli_fetch_row($rs0);

    $idmaq = $row[0];
    $maq = $row[1];
    $idpar = $row[2];
    $par = $row[3];
    $idsub = $row[4];
    $sub = $row[5];
    $titulo = $row[6];
    $descripcion = $row[7];

    $query1 = "SELECT procedimiento.idtrabajador, concat(t_apelllido,', ',t_nombre),p_prof,t_tarifa,idreptrabajo,idorden,ordentrabajo.idprocedimiento from reptrabajo
    inner join ordentrabajo on reptrabajo.idordentrabajo = ordentrabajo.idorden
    inner join procedimiento on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
    inner join m_trabajador on m_trabajador.t_dni = procedimiento.idtrabajador
    inner join m_profesion on m_profesion.p_id = m_trabajador.t_profesion
    
    where idreptrabajo = $id;";

    $rs1 = mysqli_query($con, $query1);

    $row1 = mysqli_fetch_row($rs1);

    $dniT = $row1[0];
    $nombreT = $row1[1];
    $cargoT = $row1[2];
    $tarifaT = $row1[3];

    $idRep = $row1[4];
    $idOrden = $row1[5];
    $idProc = $row1[6];

    $query2 = "SELECT o.inicio,o.final,p.cargalab,prio.nombre from ordentrabajo as o
    INNER JOIN procedimiento as p on p.idprocedimiento = o.idprocedimiento
    inner JOIN prioridad as prio on prio.idprioridad = o.idprioridad
    where o.idorden = $idOrden;";
    $rs2 = mysqli_query($con, $query2);

    $row2 = mysqli_fetch_row($rs2);

    $inicioPron = $row2[0];
    $finalPron = $row2[1];
    $tiempoPron = $row2[2];
    $prioridad = $row2[3];

    $query3 = "SELECT inicio,final,tiempo from reptrabajo where idreptrabajo = $idRep;";
    $rs3 = mysqli_query($con, $query3);
    $row3 = mysqli_fetch_row($rs3);

    $inicioReal = $row3[0];
    $finalReal = $row3[1];
    $tiempoReal = $row3[2];
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
                        <input type="text" name="idImprimir" readonly class="form-control form-control-border border-width-2" value="<?php echo ($idOrden); ?>">
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
                    <h6>ELEMENTO DEL REPORTE DE TRABAJO : </h6>
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
                    <h6>RESPONSABLE : </h6>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="form-group">
                    <label>DNI : </label>
                    <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $dniT; ?>">
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="form-group">
                    <label>NOMBRE : </label>
                    <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $nombreT; ?>">
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="form-group">
                    <label>CARGO : </label>
                    <input type="text" readonly class="form-control form-control-border border-width-2" value="<?php echo $cargoT; ?>">
                </div>
            </div>

            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>

            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <h6>TRABAJO PROGRAMADO Y REALIZADO : </h6>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1  col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" colspan="3">PRIORIDAD : <?php echo $prioridad; ?></th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PROGRAMADO</th>
                            <th scope="col">REALIZADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Horario Inicio</th>
                            <td><?php echo $inicioPron; ?></td>
                            <td><?php echo $inicioReal; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Horario Final</th>
                            <td><?php echo $finalPron; ?></td>
                            <td><?php echo $finalReal; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Duracion</th>
                            <td><?php echo $tiempoPron; ?> min</td>
                            <td><?php echo $tiempoReal; ?> min</td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="3"><?php
                                                        $differenciaTiempo = 0;
                                                        $differenciaEstado = "";
                                                        if ($tiempoPron > $tiempoReal) {
                                                            $differenciaTiempo = $tiempoPron - $tiempoReal;

                                                            $differenciaEstado = "Tiempo muerto de : " . $differenciaTiempo . " min";
                                                            echo $differenciaEstado;
                                                        } else if ($tiempoReal > $tiempoPron) {
                                                            $differenciaTiempo =  $tiempoReal - $tiempoPron;

                                                            $differenciaEstado = "Tiempo extra de : " . $differenciaTiempo . " min";
                                                            echo $differenciaEstado;
                                                        } else {
                                                            $differenciaEstado = "Tiempo programado fue el exacto";
                                                            echo $differenciaEstado;
                                                        }

                                                        ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>

            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <h6>REQUERIMIENTOS PROGRAMADOS : </h6>
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

                        $costoMPron = ($tiempoPron / 60) * $tarifaT * 100;
                        $costoMPron = round($costoMPron) / 100;

                        $costoTPron = 0;

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
                        where idprocedimiento = $idProc order by categoria.idcategoria;";

                        $rs = mysqli_query($con, $query);

                        $rows = array();

                        while ($row = mysqli_fetch_row($rs)) {
                            $rows[] = $row;
                        }

                        foreach ($rows as $row) {

                            $costoTPron = $costoTPron + $row[7];

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
                            <th colspan="8">SUBTOTALES PROGRAMADOS : </th>
                        </tr>
                        <?php

                        $costoTPron = $costoTPron + $costoMPron;

                        $categoria = array("MAQUINAS O EQUIPOS PROGRAMADOS", "HERRAMIENTAS PROGRAMADOS", "REFACCIONES PROGRAMADOS", "INSUMOS PROGRAMADOS", "EPPS PROGRAMADOS");

                        for ($k = 0; $k < 5; $k++) {

                            $etapa = $k + 1;

                            $query5 = "SELECT
                                sum(requisito.costo)
                                FROM requisito inner join inventario on requisito.idinventario = inventario.idinventario 
                                where idprocedimiento = $idProc and inventario.idcategoria = $etapa;";

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
                            <th colspan="7">MANO DE OBRA PROGRAMADA</th>
                            <th><?php echo "S/ " . $costoMPron; ?></th>
                        </tr>
                        <tr>
                            <th colspan="8">COSTO TOTAL PROGRAMADO DE : S/ <?php echo $costoTPron; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>

















            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
            </div>
























            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <h6>REQUERIMIENTOS REALES : </h6>
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

                        $costoMReal = ($tiempoReal / 60) * $tarifaT * 100;
                        $costoMReal = round($costoMReal) / 100;

                        $costoTReal = 0;

                        $query = "SELECT 
                        categoria.nombre,
                        inventario.idinventario,
                        inventario.nombre,
                        materialuso.cantidad,
                        inventario.costou,
                        tipo.nombre,
                        unidad.nombre,
                        materialuso.costo
                        FROM 
                        ((((materialuso inner join inventario on materialuso.idinventario = inventario.idinventario) inner join tipo on inventario.idtipo = tipo.idtipo) 
                        inner join fabricante on inventario.idfabricante = fabricante.idfabricante)
                        inner join categoria on inventario.idcategoria = categoria.idcategoria)
                        inner join unidad on inventario.idunidad = unidad.idunidad
                        where materialuso.idreptrabajo = $idRep order by categoria.idcategoria;";

                        $rs = mysqli_query($con, $query);

                        $rows = array();

                        while ($row = mysqli_fetch_row($rs)) {
                            $rows[] = $row;
                        }

                        foreach ($rows as $row) {

                            $costoTReal = $costoTReal + $row[7];

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
                            <th colspan="8">SUBTOTALES REALES : </th>
                        </tr>
                        <?php

                        $costoTReal = $costoTReal + $costoMReal;

                        $categoria = array("MAQUINAS O EQUIPOS REALES", "HERRAMIENTAS REALES", "REFACCIONES REALES", "INSUMOS REALES", "EPPS REALES");

                        for ($k = 0; $k < 5; $k++) {

                            $etapa = $k + 1;

                            $query5 = "SELECT
                            sum(materialuso.costo)
                            FROM materialuso inner join inventario on materialuso.idinventario = inventario.idinventario 
                            where materialuso.idreptrabajo = $idRep and inventario.idcategoria = $etapa;";

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
                            <th colspan="7">MANO DE OBRA REAL </th>
                            <th><?php echo "S/ " . $costoMReal; ?></th>
                        </tr>
                        <tr>
                            <th colspan="8">COSTO TOTAL PROGRAMADO DE : S/ <?php echo $costoTReal; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>








            <div class="col-lg-12 col-sm-12">
                <br>
                <hr>
                <br>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <h6>RESUMEN : </h6>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <p>El costo total real es de <strong>S/ <?php echo $costoTReal ?></strong>
                    con una diferencia de <strong>S/ <?php echo ($costoTReal - $costoTPron)  ?></strong> con respecto al programado
                    . Además se calculo con respecto en base al Tiempo que hay un <strong>
                        <?php

                        echo $differenciaEstado;

                        ?></strong></p>
            </div>
            <div class="col-lg-12 col-sm-12">
                <br>
                <hr>
                <br>
            </div>












            <div class="col-lg-12 col-sm-12">
                <hr>
            </div>
            <div class="col-lg-12 col-sm-12">
                <hr>
            </div>
            <div class="col-lg-12 col-sm-12">
                <hr>
            </div>
            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <h6>DESCRIPCION : </h6>
                </div>
            </div>
            <div class="col-lg-12  col-sm-12">
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