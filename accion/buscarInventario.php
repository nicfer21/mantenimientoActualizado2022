<?php
include("coneccion.php");

$tabla = $_POST['tabla'];
$nombre = $_POST['nombre'];

$query = "SELECT * FROM $tabla where nombre = '$nombre';";

$rs = mysqli_query($con, $query);

$row = mysqli_fetch_row($rs);

echo $row[0];

