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
                        <i class="nav-icon fas fa-window-maximize"></i>
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

                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Maquinas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="#" class="nav-link">
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
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Matriz de diagnostico I</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Matriz de diagnostico II</p>
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

                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>