<?php

include("coneccion.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM maquina WHERE id_maq =  '$id';";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    foreach ($rows as $row) {
        array_push($data, [
            'id' => $row[0],
            'marca' => $row[1],
            'modelo' => $row[2],
            'nombre' => $row[3],
            'descripcion' => $row[4],
            'imagen' => $row[5]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}
