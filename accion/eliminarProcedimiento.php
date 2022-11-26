<?php
include("coneccion.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM procedimiento WHERE idprocedimiento = $id;";

    $rs = mysqli_query($con, $query);

    echo $rs;
} else {
    echo "0";
}
