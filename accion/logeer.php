<?php
session_start();

include("coneccion.php");

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $query = "SELECT * FROM (usuario inner join m_trabajador on usuario.user = m_trabajador.t_dni)
    inner join m_profesion on m_trabajador.t_profesion = m_profesion.p_id where usuario.user ='$user' AND usuario.pass ='$pass'";

    $rs = mysqli_query($con, $query);

    if ($row = mysqli_fetch_row($rs)) {

        $_SESSION['id']  = $row[0];
        $_SESSION['nombre'] = $row[1];
        $_SESSION['imagen'] = $row[2];
        $_SESSION['usuario'] = $row[3];
        $_SESSION['tipo'] = $row[5];

        $_SESSION['nombreC'] = $row[7] . ", " . $row[8];

        $_SESSION['profesion'] =  $row[14];

        $_SESSION['estado'] = 1;

        //Incrustar sesion a la bd

        $idUsuario = $_SESSION['usuario'];

        $ip = real_ip();

        $data = array();
        $data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));

        $region = $data['geoplugin_region'];
        $ciudad = $data['geoplugin_city'];
        $latitud = $data['geoplugin_latitude'];
        $longitud = $data['geoplugin_longitude'];

        if ($region == "") {
            $region = "Local";
        }
        if ($ciudad == "") {
            $ciudad = "Local";
        }
        if ($latitud == "") {
            $latitud = "Local";
        }
        if ($longitud == "") {
            $longitud = "Local";
        }

        $query = "";
        $query = "INSERT INTO sesion (user , dir_ip , region , ciudad , latitud , longitud )
                    VALUES ('$idUsuario','$ip','$region','$ciudad','$latitud','$longitud');";

        echo $query;

        mysqli_query($con, $query);

        redireccion();
    } else {

        redireccion();
    }
} else {

    redireccion();
}

mysqli_close($con);

function redireccion()
{
    header('Location: ../inicio');
}

function real_ip()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] as $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    return $ip;
}
