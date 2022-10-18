<?php

include("coneccion.php");

if (isset($_POST['subparte'])) {

    $subparte = $_POST['subparte'];

    $query = "SELECT * from procedimiento where idsubparte = '$subparte';";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    array_push($data, [
        'id' => 'o',
        'procedimiento' => 'Seleccione ...'
    ]);

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'procedimiento' => $row[1]
        ]);
    }


    echo json_encode($data);

    mysqli_close($con);
}
