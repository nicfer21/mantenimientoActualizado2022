<?php

include("coneccion.php");

if (isset($_POST['dni'])) {

    $dni = $_POST['dni'];

    $query = "SELECT t_dni, concat(t_apelllido,', ' ,t_nombre),p_prof,j_jor from 
    (m_trabajador inner join m_profesion on m_profesion.p_id = m_trabajador.t_profesion)
    inner join m_jornada on m_trabajador.t_jornada = m_jornada.j_id where t_estado = 1 AND t_profesion <> 1 AND t_dni = '$dni';";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    foreach ($rows as $row) {
        array_push($data, [
            'dni' => $row[0],
            'nombre' => $row[1],
            'ocupacion' => $row[2],
            'paga' => $row[3]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}
