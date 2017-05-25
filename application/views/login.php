<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>OneLink El Salvador</title>

        <link href="https://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
        <?php $this->load->view('common/common_header'); ?>
    </head>

    <body>

        <div class="container" >

            <?php
            echo form_open('login_Controller/validate', array('class' => 'form-signin', 'method' => 'POST'));

            echo "<h2 class='form-signin-heading'>OneLink El Salvador <br> Inicie Sesión</h2>";
            $datos = array('name' => 'nickname_usuario', 'type' => 'text', 'placeholder' => 'usuario', 'class' => 'form-control');

            echo form_input($datos);
            echo '<br>';
            echo form_input(array('type' => 'password', 'name' => 'password_usuario', 'placeholder' => 'password', 'class' => 'form-control'));
            echo '<br>';

            echo form_input(array('name' => 'boton', 'value' => 'iniciar', 'type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block'));
            ?>


            <?php $this->load->view('common/common_footer'); ?>
    </body>
</html>