<?php

include("coneccion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "SELECT o.idorden,p.nombre,t.t_dni,concat(t.t_apelllido,', ',t.t_nombre),prof.p_prof 
    from ordentrabajo as o inner join procedimiento as p on o.idprocedimiento = p.idprocedimiento
    inner join m_trabajador as t on t.t_dni = p.idtrabajador
    inner join m_profesion as prof on t.t_profesion = prof.p_id where o.idorden = $id;";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'titulo' => $row[1],
            'dni' => $row[2],
            'nombre' => $row[3],
            'ocupacion' => $row[4]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}
