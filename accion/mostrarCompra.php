<?php

include("coneccion.php");

$sql="SET time_zone = '-05:00';";
$asd = mysqli_query($con,$sql);

$query = "SELECT 
            compra.idcompra,
            inventario.nombre,
            compra.cantidad,
            date(fecha) as dia,
            time(fecha) as hora
            
            FROM compra inner join inventario on compra.idinventario = inventario.idinventario order by compra.idcompra desc;";

$rs = mysqli_query($con, $query);

$filas = mysqli_num_rows($rs);

while ($row = mysqli_fetch_row($rs)) {
    $rows[] = $row;
}

$data = array();

foreach ($rows as $row) {
    array_push($data, [
        $row[0], $row[1], $row[2], $row[3], $row[4]
    ]);
}

$json_data = array(
    "recordsTotal"    => $filas,
    "success"         => true,
    "aaData"          => $data
);


echo json_encode($json_data);

mysqli_close($con);
