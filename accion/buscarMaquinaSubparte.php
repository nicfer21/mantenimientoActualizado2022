<?php

include("coneccion.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT subparte.id_parte, parte.parte, subparte.id_subparte, subparte.subparte,subparte.descripcion  FROM subparte INNER JOIN parte ON subparte.id_parte = parte.id_parte
    where subparte.id_maq = '$id' ORDER BY subparte.id_subparte;";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $data = array();

    foreach ($rows as $row) {
        array_push($data, [
            'idparte' => $row[0],
            'parte' => $row[1],
            'idsubparte' => $row[2],
            'subparte' => $row[3],
            'descripcion' => $row[4]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}

