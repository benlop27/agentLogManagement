<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard Agente - OneLink</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        $this->load->view('common/common_header');
        $this->load->model('estado');
        $this->estado->recuperaEstado();
        $fecha = $this->session->userdata('fecha_ultimo_estado');
        ;
        echo "<script type='text/javascript'>";
        echo "var fecha_ultimo_estado ='" . $fecha . "';";
        echo "</script>";
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
            <nav class="navbar navbar-default ">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">OneLink Agente Dashboard </a>
                    </div>

                    <!--Navbar de Administrador-->
                    <div id="navbar" class="navbar-collapse collapse">

                        <ul class="nav navbar-nav navbar-right ">

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
        <hr/>
        <div class="container">
            <br/>
            <div class="container">
                <div class="col-md-8">
                    <h3>Sus Estados</h3> 

                    <?php echo $output; ?>
                </div>

                <div class="col-md-4">
                    <?php
                    $this->load->view('cambiarEstado');
                    ?>

                </div>



            </div>

            <script type="text/javascript">
                function printTiempo() {
                    var t = moment(fecha_ultimo_estado);

                    var h = moment().diff(t);

                    document.getElementById('date').value = moment(h).utc().format('HH:mm:ss');
                    document.getElementById('horaActual').value = moment().format('Y-MM-DD HH:mm:ss');

                    document.getElementById('fecha_ultimo_estado').value = fecha_ultimo_estado;

                }
                setInterval(printTiempo, 1000);


            </script>
            <?php $this->load->view('common/common_footer'); ?>
    </body>
</html>
