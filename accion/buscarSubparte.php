<?php

include("coneccion.php");

if (isset($_POST['parte'])) {
    $parte = $_POST['parte'];

    $query = "SELECT * from subparte where id_parte = '$parte';";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    array_push($data, [
        'id' => 'o',
        'subparte' => 'Seleccione ...'
    ]);

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'subparte' => $row[1]
        ]);
    }


    echo json_encode($data);

    mysqli_close($con);
}
