<?php

include("coneccion.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "SELECT inventario.idinventario,inventario.nombre,requisito.cantidad,unidad.nombre,requisito.costo from (requisito inner join inventario on requisito.idinventario = inventario.idinventario)
    inner join unidad on inventario.idunidad = unidad.idunidad
    where idprocedimiento = $id order by idrequisito;";

    $rs = mysqli_query($con, $query);

    $rows = array();

    while ($row = mysqli_fetch_row($rs)) {
        $rows[] = $row;
    }

    $resultado = "";

    foreach ($rows as $row) {
        $resultado = $resultado . "<tr>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
                                        <td>$row[3]</td>
                                        <td>$row[4]</td>
                                    </tr>";
    }

    echo $resultado;

    mysqli_close($con);
}
