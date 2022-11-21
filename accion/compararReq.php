<?php
if (isset($_POST['idV'])) {

    include('coneccion.php');

    $ids = array();
    $nombres = array();
    $cantidad = array();

    $valido = 0;
    $mensaje = "\n";

    parse_str($_POST['idV'],$ids);
    parse_str($_POST['nombreV'],$nombres);
    parse_str($_POST['cantidadV'],$cantidad);

    $tamaño = count($ids['idReq']);
    
    //print_r($nombres['nombreReq']);

    for ($i=0; $i < $tamaño; $i++) { 

        $query = "SELECT cantidad from inventario where idinventario = " . $ids['idReq'][$i] . ";";
        
        $rs = mysqli_query($con, $query);
        $row = mysqli_fetch_row($rs);

        if ($row[0] < $cantidad['cantidadReq'][$i]) {
            $mensaje = $mensaje . "-> Existencias de '" . $nombres['nombreReq'][$i] . "' disponibles en el inventario : " . $row[0] . " \n ";
            $valido = 1;
        }

    }

    $data = array();

    array_push($data, [
        'valido' => $valido,
        'mensaje' => $mensaje
    ]);

    echo json_encode($data);  

    mysqli_close($con);
}
