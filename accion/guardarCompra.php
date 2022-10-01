<?php
include("coneccion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    $query = "INSERT INTO compra (cantidad,idinventario) values ($cantidad, $id);";

    $rs = mysqli_query($con, $query);

    if ($rs == 1) {

        $query = "SELECT cantidad from inventario where idinventario = $id;";

        $rs1 = mysqli_query($con, $query);

        $row = mysqli_fetch_row($rs1);

        $suma = $row[0] + $cantidad;

        $querysuma = "UPDATE sys.inventario
        SET cantidad = $suma
        WHERE idinventario = $id;";

        $rs2 = mysqli_query($con, $querysuma);

        if ($rs2) {
            echo "1";
        } else {
            echo "0";
        }
    } else {
        echo "0";
    }
} else {
    echo "0";
}
