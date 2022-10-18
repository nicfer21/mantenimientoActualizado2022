<?php

include("coneccion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "SELECT 
    idprocedimiento,
    procedimiento.nombre,
    idmaquina,
    maquina.nombre,
    idparte,
    parte.parte,
    idsubparte,
    subparte.subparte,
    estrategia.nombre,
    cargalab,
    t_dni,
    concat(t_apelllido, ', ',t_nombre),
    m_profesion.p_prof,
    lugar.nombre,
    instruccion,
    ley
    FROM 
    ((((((procedimiento inner join estrategia on procedimiento.idestrategia = estrategia.idestrategia)
    inner join lugar on procedimiento.idlugar = lugar.idlugar)
    inner join m_trabajador on m_trabajador.t_dni = procedimiento.idtrabajador)
    INNER JOIN maquina on procedimiento.idmaquina = maquina.id_maq)
    INNER join parte on procedimiento.idparte = parte.id_parte)
    INNER JOIN subparte on procedimiento.idsubparte = subparte.id_subparte)
    INNER join m_profesion on m_trabajador.t_profesion = m_profesion.p_id where procedimiento.idprocedimiento = $id;";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'nombre' => $row[1],
            'idmaquina' => $row[2],
            'maquina' => $row[3],
            'idparte' => $row[4],
            'parte' => $row[5],
            'idsubparte' => $row[6],
            'subparte' => $row[7],
            'estrategia' => $row[8],
            'duracion' => $row[9],
            'dni' => $row[10],
            'trabajador' => $row[11],
            'profesion' => $row[12],
            'lugar' => $row[13],
            'instruccion' => $row[14],
            'ley' => $row[15]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}
