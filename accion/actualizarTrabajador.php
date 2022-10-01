<?php

include("coneccion.php");

if (isset($_POST['txtdniTrabajadorActualizar'])) {

    $dni = $_POST['txtdniTrabajadorActualizar'];
    $apellido = $_POST['txtapellidoTrabajadorActualizar'];
    $nombre = $_POST['txtnombreTrabajadorActualizar'];
    $apellido = strtoupper($apellido);
    $nombre = strtoupper($nombre);
    $profesion = $_POST['txtprofesionTrabajadorActualizar'];
    $jornada = $_POST['txtjornadaTrabajadorActulizar'];
    $tarifa = $_POST['txttarifaTrabajadorActualizar'];

    $sql = "UPDATE m_trabajador SET
            t_apelllido = '$apellido',
            t_nombre = '$nombre',
            t_profesion = '$profesion',
            t_jornada = '$jornada',
            t_tarifa = $tarifa
            WHERE t_dni = '$dni';";

    echo $sql;

    if (!mysqli_query($con, $sql)) {
        header('Location: ../trabajador');
    } else {
        echo "no problemo";
        header('Location: ../trabajador');
    }

    mysqli_close($con);
}
