<?php
include("coneccion.php");

if (isset($_POST['id'])) {

    $titulo = $_POST['titulo'];
    $trabajador =  trim($_POST['id']);
    $maquina = $_POST['maquina'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO sys.solicitud
    (titulo,idtrabajador,idmaq,idlugar,texto)
    VALUES
    ('$titulo','$trabajador','$maquina',$lugar,'$descripcion');";

    $rs = mysqli_query($con, $query);

    header('Location: ../crearSolicitud');


}
