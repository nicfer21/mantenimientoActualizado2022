<?php
include("coneccion.php");

if (isset($_POST['txteliminardni'])) {

    $dni = $_POST['txteliminardni'];

    $sql = "UPDATE m_trabajador SET
            t_estado = '0'
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
