<?php

include("coneccion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "SELECT inventario.idinventario,inventario.nombre,inventario.costou,tipo.nombre,categoria.nombre,requisito.cantidad,requisito.costo from
    requisito inner join inventario on requisito.idinventario = inventario.idinventario
    inner join tipo on tipo.idtipo = inventario.idtipo
    inner join categoria on categoria.idcategoria = inventario.idcategoria
    inner join procedimiento on procedimiento.idprocedimiento = requisito.idprocedimiento
    inner join ordentrabajo on ordentrabajo.idprocedimiento = procedimiento.idprocedimiento
    where ordentrabajo.idorden = $id order by idinventario;";

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
            'costou' => $row[2],
            'tipo' => $row[3],
            'categoria' => $row[4],
            'cantidad' => $row[5],
            'costost' => $row[6]
        ]);
    }

    echo json_encode($data);

    mysqli_close($con);
}
