<?php
include("coneccion.php");

if (isset($_POST['dataid'])) {

    $id = $_POST['dataid'];
    $inicio = $_POST['datainicio'];
    $final = $_POST['datafinal'];
    $tiempo = $_POST['tiempoTrabajo'];
    $observacion = $_POST['descripcion'];

    echo $id . " ";
    echo $inicio . " ";
    echo $final . " ";
    echo $tiempo . " ";
    echo $observacion . " ";

    // cambiar la orden de trabajo a realizado

    $query0 = "UPDATE ordentrabajo
        SET estado = 2
        WHERE idorden = $id;";

    mysqli_query($con, $query0);

    // guardar datos del reporte

    $query1 = "INSERT INTO reptrabajo
    (idordentrabajo,inicio,final,tiempo,observacion)
    VALUES
    ($id,'$inicio','$final',$tiempo,'$observacion');";

    echo $query1 . "<br>";

    $rs = mysqli_query($con,$query1);

    if ($rs == 1) {

        $query2 = "SELECT idreptrabajo from reptrabajo order by idreptrabajo desc limit 1;";

        $rs2 = mysqli_query($con, $query2);

        $row = mysqli_fetch_row($rs2);

        $idRepTrabajo = $row[0];

        echo $idRepTrabajo . "<br>";

        if (isset($_POST['idReq'])) {

            $idInv[] =  $_POST['idReq'];
            $nombreInv[] = $_POST['nombreReq'];
            $cantidadInv[] = $_POST['cantidadReq'];

            $index = count($_POST['idReq']);

            echo $index . "<br>";

            for ($i = 0; $i < $index; $i++) {

                $query3 = "SELECT cantidad,idtipo,costou from inventario where idinventario = " . $idInv[0][$i] . ";";
                $rs3 = mysqli_query($con, $query3);
                $row = mysqli_fetch_row($rs3);

                $cantidad = $row[0];
                $tipo = $row[1];
                $costou = $row[2];
                $costoST = 0;

                echo "<br>" . $cantidad;
                echo " - " . $tipo;

                echo (" / " . $idInv[0][$i]);
                echo (" / " . $nombreInv[0][$i]);
                echo (" / " . $cantidadInv[0][$i]);

                if ($tipo == 1) {
                    $costoST =  $costou * $cantidadInv[0][$i];
                } else {
                    $costoST = (($costou / 60) * $tiempo * $cantidadInv[0][$i]) * 100;
                    $costoST = round($costoST) / 100;
                }

                echo " :: " . $costoST . " :: ";

                $query4 = "INSERT INTO materialuso
                (idreptrabajo,idinventario,cantidad,costo)
                VALUES
                ($idRepTrabajo," . $idInv[0][$i] . "," . $cantidadInv[0][$i] . ",$costoST);";

                mysqli_query($con, $query4);

                if ($tipo == 1) {
                    echo "Reducir inv";

                    $diferencia = $cantidad - $cantidadInv[0][$i];
                    echo "  dif : " . $diferencia;

                    $query5 = "UPDATE inventario
                    SET
                    cantidad = $diferencia
                    WHERE idinventario = " . $idInv[0][$i] . ";";

                    mysqli_query($con, $query5);

                }
            }
        }
    }
}

header('Location: ../crearReporteTrabajo');

mysqli_close($con);
