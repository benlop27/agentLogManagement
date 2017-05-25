<!DOCTYPE html>
<html>
    <head>

        <title>Dashboard Supervisor - OneLink</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
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
                <a class="navbar-brand" href="#">OneLink Supervisor Dashboard </a>
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">


                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo site_url('dashboard_Supervisor_Controller/') ?>">Inicio</a></li>


                            <li><a href='<?php echo site_url('dashboard_Supervisor_Controller/empleados_estados') ?>'>Estados de los Empleados</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $this->session->userdata('nickname_usuario'); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">

                                    <li class="dropdown-header">Usuario</li>

                                    <li><a href="<?php echo site_url('login_Controller/cerrarSesion'); ?>">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>	 

        </div>


        <div class="container">

            <?php echo $output; ?>
        </div>
            <?php $this->load->view('common/common_footer'); ?>
    </body>
</html>
