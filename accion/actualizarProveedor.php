<?php
include("coneccion.php");

if (isset($_POST['nombre'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre = strtoupper($nombre);

    $query = "UPDATE proveedor SET nombre = '$nombre' WHERE idproveedor = $id;";

    $rs = mysqli_query($con, $query);

    echo $rs;
    
} else {
    echo "0";
}
