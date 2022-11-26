<?php
include("coneccion.php");

if (isset($_POST['id'])) {

    $titulo = $_POST['titulo'];
    $trabajador =  trim($_POST['id']);
    $maquina = $_POST['maquina'];
    $lugar = $_POST['lugar'];
    $descripcion = $_POST['descripcion'];
    

    $query = "INSERT INTO solicitud
    (titulo,idtrabajador,idmaq,idlugar,texto,estado)
    VALUES
    ('$titulo','$trabajador','$maquina',$lugar,'$descripcion',1);";

    $rs = mysqli_query($con, $query);

    header('Location: ../crearSolicitud');


}
