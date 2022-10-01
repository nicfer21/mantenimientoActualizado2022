<?php
include("coneccion.php");

if (isset($_POST['nombre'])) {

    $nombre = $_POST['nombre'];
    $nombre = strtoupper($nombre);

    $costou = $_POST['costou'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $fabricante = $_POST['fabricante'];
    $proveedor = $_POST['proveedor'];
    $categoria = $_POST['categoria'];

    $query = "";

    $rs = mysqli_query($con, $query);

    echo $rs;
} else {
    echo "0";
}
