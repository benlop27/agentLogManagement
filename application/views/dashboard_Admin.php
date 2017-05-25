<!DOCTYPE html>
<html>
    <head>

        <title>Dashboard Admin - OneLink</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        $this->load->view('common/common_header');
        ?>
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </head>
    <body>
        <div class="container">

            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">OneLink Admin Dashboard </a>
                    </div>

                    <!--Navbar de Administrador-->
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href='<?php echo site_url('dashboard_Admin_Controller/usuarios') ?>'>Usuarios</a></li>
                            <li><a href='<?php echo site_url('dashboard_Admin_Controller/departamentos') ?>'>Departamentos</a></li>
                            <li><a href='<?php echo site_url('dashboard_Admin_Controller/areas') ?>'>Areas</a></li>
                            <li><a href='<?php echo site_url('dashboard_Admin_Controller/cuentas') ?>'>Cuentas</a></li>
                            <li><a href='<?php echo site_url('dashboard_Admin_Controller/empleados') ?>'>Empleados</a></li>
                            <li><a href='<?php echo site_url('dashboard_Admin_Controller/empleados_estados') ?>'>Estados de los Empleados</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nickname_usuario'); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">usuario</li>
                                    <li><a href="<?php echo site_url('login_Controller/cerrarSesion'); ?>">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>	 

        </div>
        <div style='height:20px;'></div>  
        <div class="container">
            <?php echo $output; ?>
        </div>
        <?php $this->load->view('common/common_footer'); ?>
    </body>
</html>
