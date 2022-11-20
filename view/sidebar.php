<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="#" class="brand-link">
        <img src="dist/img/LogoEmpresa.JPG" alt="Mantenimiento" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>MANTENIMIENTO</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION['imagen']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $_SESSION['nombre']; ?>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a id="link_empresa" href="inicio" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="link_empresa" href="empresa" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Empresa
                        </p>
                    </a>
                </li>
                <?php
                if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) {
                    echo '<li class="nav-item">
                       <a id="link_trabajador" href="trabajador" class="nav-link">
                           <i class="nav-icon fas fa-address-card" aria-hidden="true"></i>
                           <p>
                               Trabajadores
                           </p>
                       </a>
                   </li>';
                }

                ?>
                <li class="nav-item">
                    <a href="calendario" class="nav-link">
                        <i class="nav-icon fa fa-calendar-check"></i>
                        <p>
                            Calendario
                        </p>
                    </a>
                </li>
                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Maquinas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="fichatecnica" class="nav-link">
                                <i class="fas  fa-cog nav-icon"></i>
                                <p>Fichas tecnicas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="partes-subpartes" class="nav-link">
                                <i class="fas  fa-cog nav-icon"></i>
                                <p>Partes y subpartes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="matriz" class="nav-link">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Matrices</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <?php
                if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) {
                    echo '
                    
                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Inventario
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="inventario" class="nav-link">
                                <i class="fas  fa-square nav-icon"></i>
                                <p>Existencias</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="categoria" class="nav-link">
                                <i class="fas  fa-square nav-icon"></i>
                                <p>Categorias</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="compras" class="nav-link">
                                <i class="fas  fa-square nav-icon"></i>
                                <p>Compras</p>
                            </a>
                        </li>

                    </ul>
                </li>';
                }

                ?>



                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Procedimientos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="crearprocedimiento" class="nav-link">
                                <i class="fas  fa-window-maximize nav-icon"></i>
                                <p>Crear procedimiento</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="listaprocedimiento" class="nav-link">
                                <i class="fas fa-window-maximize nav-icon"></i>
                                <p>Lista de procedimiento</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Solicitud de trabajo
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="crearSolicitud" class="nav-link">
                                <i class="fas  fa-file nav-icon"></i>
                                <p>Crear solicitud</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="listaSolicitud" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Lista de solicitudes</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Orden de trabajo
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="crearOrden" class="nav-link">
                                <i class="fas  fa-bookmark nav-icon"></i>
                                <p>Crear orden</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="listaOrden" class="nav-link">
                                <i class="fas fa-bookmark nav-icon"></i>
                                <p>Lista de ordenes</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>