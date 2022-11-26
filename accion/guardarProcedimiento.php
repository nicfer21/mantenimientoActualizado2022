<?php
include("coneccion.php");

if (isset($_POST['nombre'])) {

    $nombreProc = strtoupper($_POST['nombre']);
    $estrategia = $_POST['estrategia'];
    $lugar = $_POST['lugar'];
    $carga = $_POST['carga'];
    $instrucciones = $_POST['instrucciones'];
    $leynorma = $_POST['leynorma'];

    $idmaq = $_POST['idmaq'];
    $idparte = $_POST['idparte'];
    $idsubparte = $_POST['idsubparte'];

    $trabajador = $_POST['trabajador'];

    $query = "INSERT INTO procedimiento
    (nombre,idmaquina,idparte,idsubparte,idestrategia,cargalab,idtrabajador,idlugar,instruccion,ley)
    VALUES ('$nombreProc','$idmaq','$idparte','$idsubparte',$estrategia,$carga,'$trabajador',$lugar,'$instrucciones','$leynorma');";

    $rs = mysqli_query($con, $query);

    if (isset($_POST['idReq'])) {
        $arrayidReq = array();
        $arraycantidadReq = array();
        $arraycostoTotalReq = array();

        $arrayidReq = $_POST['idReq'];
        $arraycantidadReq = $_POST['cantidadReq'];
        $arraycostoTotalReq = $_POST['costoTotalReq'];

        if ($rs == 1) {

            $query2 = "SELECT * from procedimiento order by procedimiento.idprocedimiento desc limit 1;";

            $rs2 = mysqli_query($con, $query2);

            $row[] = mysqli_fetch_row($rs2);

            $valId = $row[0][0];

            for ($i = 0; $i < count($arrayidReq); $i++) {
                $query3 = "INSERT INTO requisito
                (idprocedimiento,idinventario,cantidad,costo) VALUES ($valId,$arrayidReq[$i],$arraycantidadReq[$i],$arraycostoTotalReq[$i]);";
                $rs3 = mysqli_query($con, $query3);
            }
        } else {

            echo "ERROR";
        }
    }

    header('Location: ../crearprocedimiento');
} else {
    echo "0";
    header('Location: ../crearprocedimiento');
}
