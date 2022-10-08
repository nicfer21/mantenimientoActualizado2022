<?php

include("coneccion.php");

if (isset($_POST['id'])) {

    $idItem = $_POST['id'];

    $query = "SELECT 
    inventario.idinventario,
    inventario.nombre,
    inventario.costou,
    unidad.nombre,
    tipo.nombre,
    categoria.nombre
    FROM 
    ((inventario inner join tipo on inventario.idtipo = tipo.idtipo) 
    inner join categoria on inventario.idcategoria = categoria.idcategoria)
    inner join unidad on inventario.idunidad = unidad.idunidad where inventario.idinventario = $idItem;";

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
            'costo' => $row[2],
            'unidad' => $row[3],
            'tipo' => $row[4],
            'categoria' => $row[5]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}
