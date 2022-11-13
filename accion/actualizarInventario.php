<?php
include("coneccion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $nombre = $_POST['nombre'];
    $nombre = strtoupper($nombre);

    $costou = $_POST['costou'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $fabricante = $_POST['fabricante'];
    $proveedor = $_POST['proveedor'];
    $categoria = $_POST['categoria'];
    $unidad = $_POST['unidad'];

    $query = "UPDATE sys.inventario SET
    nombre = '$nombre',
    costou = $costou,
    cantidad = $cantidad,
    idtipo = $tipo,
    idfabricante = $fabricante,
    idproveedor = $proveedor,
    idcategoria = $categoria,
    idunidad = $unidad
    WHERE idinventario = $id;";

    $rs = mysqli_query($con, $query);

    echo $rs;
} else {
    echo "0";
}
