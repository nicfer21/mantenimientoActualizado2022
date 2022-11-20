<?php
include("coneccion.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM ordentrabajo WHERE idorden = $id;";

    $rs = mysqli_query($con, $query);

    echo "1";

} else {
    echo "0";
}
