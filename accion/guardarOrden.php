<?php
include("coneccion.php");

if (isset($_POST['idprocedimiento'])) {

    $procedimiento = $_POST['idprocedimiento'];

    $fechaInicial = $_POST['fechaInicial'];
    $fechaFinal = $_POST['fechaFinal'];

    $trabajador =  $_POST['trabajador'];
    $prioridad =  $_POST['prioridad'];

    $descripcion =  $_POST['descripcion'];

    $query = "INSERT INTO ordentrabajo
(idprocedimiento,inicio,final,idtrabajador,idprioridad,descripcion)
VALUES ($procedimiento,'$fechaInicial','$fechaFinal','$trabajador',$prioridad,'$descripcion');";

    if ($rs = mysqli_query($con, $query)) {
        header('Location: ../crearOrden');
    } else {
        header('Location: ../crearOrden');
    }
} else {
    header('Location: ../crearOrden');
}
