<?php

include("coneccion.php");

$query = "SELECT 
            inventario.idinventario,
            inventario.nombre,
            inventario.costou,
            inventario.cantidad,
            unidad.nombre,
            tipo.nombre,
            fabricante.nombre,
            proveedor.nombre,
            categoria.nombre
            FROM 
            ((((inventario inner join tipo on inventario.idtipo = tipo.idtipo) 
            inner join fabricante on inventario.idfabricante = fabricante.idfabricante)
            inner join proveedor on inventario.idproveedor = proveedor.idproveedor)
            inner join categoria on inventario.idcategoria = categoria.idcategoria)
            inner join unidad on inventario.idunidad = unidad.idunidad;";

$rs = mysqli_query($con, $query);

$filas = mysqli_num_rows($rs);

while ($row = mysqli_fetch_row($rs)) {
    $rows[] = $row;
}

$data = array();

foreach ($rows as $row) {
    array_push($data, [
        $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
    ]);
}

$json_data = array(
    "recordsTotal"    => $filas,
    "success"         => true,
    "aaData"          => $data
);


echo json_encode($json_data);

mysqli_close($con);
