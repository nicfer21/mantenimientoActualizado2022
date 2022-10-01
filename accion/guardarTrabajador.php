<?php
include("coneccion.php");

if (isset($_POST['txtdni'])) {

    $dni = $_POST['txtdni'];

    $apellido = $_POST['txtapellido'];
    $apellido = strtoupper($apellido);

    $nombre = $_POST['txtnombre'];
    $nombre = strtoupper($nombre);

    $profesion = $_POST['txtprofesion'];
    $jornada = $_POST['txtjornada'];
    $tarifa = $_POST['txttarifa'];

    $sql = "INSERT INTO m_trabajador(t_dni,t_apelllido,t_nombre,t_profesion,t_jornada,t_tarifa,t_estado)
                VALUES('$dni','$apellido','$nombre','$profesion','$jornada',$tarifa,'1');";

    echo $sql;

    if (!mysqli_query($con, $sql)) {
        header('Location: ../trabajador');
    } else {
        echo "no problemo";
        header('Location: ../trabajador');
    }

    $nombrecompleto = explode(" ",$apellido);

    $name = $nombrecompleto[0];
    $name = $name . " " . $nombre;

    $query = "INSERT INTO usuario (nombre,user,tipo) 
                VALUES ('$name','$dni','3');";

    mysqli_query($con,$query);            

    mysqli_close($con);
}
