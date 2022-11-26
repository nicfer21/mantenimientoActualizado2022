<?php

include("coneccion.php");

if (isset($_POST['maquina'])) {
    $maquina = $_POST['maquina'];

    $query = "SELECT * from parte where parte.id_maq = '$maquina';";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    array_push($data, [
        'id' => 'o',
        'parte' => 'Seleccione ...'
    ]);

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'parte' => $row[1]
        ]);
    }


    echo json_encode($data);

    mysqli_close($con);
}
