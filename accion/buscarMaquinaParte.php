<?php

include("coneccion.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM parte  WHERE parte.id_maq = '$id' ORDER BY parte.id_parte;";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'parte' => $row[1],
            'descripcion' => $row[2]
        ]);
    }


    echo json_encode($data);

    mysqli_close($con);
}
