<?php
session_start();

require "view/header.php";

require "accion/coneccion.php";

if (isset($_SESSION['estado'])) {

    if ($_SESSION['estado'] == 1) {

        require "view/navbar.php";

        require "view/sidebar.php";


        if (isset($_GET['view'])) {

            $tipo = $_SESSION['tipo'];

            switch ($tipo) {
                case 1:

                    if (
                        $_GET['view'] == "inicio" ||
                        $_GET['view'] == "trabajador" ||
                        $_GET['view'] == "empresa" ||
                        $_GET['view'] == "categoria" ||
                        $_GET['view'] == "inventario" ||
                        $_GET['view'] == "compras" ||
                        $_GET['view'] == "calendario" ||
                        $_GET['view'] == "crearprocedimiento" ||
                        $_GET['view'] == "listaprocedimiento" ||
                        $_GET['view'] == "crearSolicitud" ||
                        $_GET['view'] == "listaSolicitud" ||
                        $_GET['view'] == "crearReporteTrabajo" ||
                        $_GET['view'] == "listaReporteTrabajo" ||
                        $_GET['view'] == "crearOrden" ||
                        $_GET['view'] == "listaOrden" ||
                        $_GET['view'] == "fichatecnica" ||
                        $_GET['view'] == "matriz" ||
                        $_GET['view'] == "partes-subpartes"
                    ) {
                        require "view/" . $_GET['view'] . ".php";
                    } else {
                        require "view/inicio.php";
                    }
                    break;
                case 2:
                    if (
                        $_GET['view'] == "inicio" ||
                        $_GET['view'] == "trabajador" ||
                        $_GET['view'] == "empresa" ||
                        $_GET['view'] == "categoria" ||
                        $_GET['view'] == "inventario" ||
                        $_GET['view'] == "compras" ||
                        $_GET['view'] == "calendario" ||
                        $_GET['view'] == "crearprocedimiento" ||
                        $_GET['view'] == "listaprocedimiento" ||
                        $_GET['view'] == "crearSolicitud" ||
                        $_GET['view'] == "listaSolicitud" ||
                        $_GET['view'] == "crearReporteTrabajo" ||
                        $_GET['view'] == "listaReporteTrabajo" ||
                        $_GET['view'] == "crearOrden" ||
                        $_GET['view'] == "listaOrden" ||
                        $_GET['view'] == "fichatecnica" ||
                        $_GET['view'] == "matriz" ||
                        $_GET['view'] == "partes-subpartes"
                    ) {
                        require "view/" . $_GET['view'] . ".php";
                    } else {
                        require "view/inicio.php";
                    }
                    break;

                case 3:

                    if (
                        $_GET['view'] == "inicio" ||
                        $_GET['view'] == "trabajador" ||
                        $_GET['view'] == "empresa" ||
                        $_GET['view'] == "categoria" ||
                        $_GET['view'] == "inventario" ||
                        $_GET['view'] == "compras" ||
                        $_GET['view'] == "calendario" ||
                        $_GET['view'] == "crearprocedimiento" ||
                        $_GET['view'] == "listaprocedimiento" ||
                        $_GET['view'] == "crearSolicitud" ||
                        $_GET['view'] == "listaSolicitud" ||
                        $_GET['view'] == "crearReporteTrabajo" ||
                        $_GET['view'] == "listaReporteTrabajo" ||
                        $_GET['view'] == "crearOrden" ||
                        $_GET['view'] == "listaOrden" ||
                        $_GET['view'] == "fichatecnica" ||
                        $_GET['view'] == "matriz" ||
                        $_GET['view'] == "partes-subpartes"
                    ) {
                        require "view/" . $_GET['view'] . ".php";
                    } else {
                        require "view/inicio.php";
                    }
                    break;

                default:
                    include("view/inicio.php");
                    break;
            }
        } else {
            include("view/inicio.php");
        }

        require "view/prefooter.php";
    }
} else {

    require "view/login.php";
}

require "view/footer.php";
