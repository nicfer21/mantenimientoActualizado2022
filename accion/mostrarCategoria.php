<?php

include("coneccion.php");

$query = "SELECT * FROM categoria;";

$rs = mysqli_query($con, $query);

$filas = mysqli_num_rows($rs);

while ($row = mysqli_fetch_row($rs)) {
    $rows[] = $row;
}

$data = array();

foreach ($rows as $row) {
    array_push($data, [
        $row[0],$row[1]
    ]);
}

$json_data = array(
    "recordsTotal"    => $filas,
    "success"         => true,
    "aaData"          => $data
);


echo json_encode($json_data);

mysqli_close($con);
