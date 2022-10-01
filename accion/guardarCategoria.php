<?php
include("coneccion.php");

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $nombre = strtoupper($nombre);
    
    $query = "INSERT INTO categoria (nombre) VALUES ('$nombre');";

    $rs = mysqli_query($con,$query);

    echo $rs;

}else{
    echo "0";
}

