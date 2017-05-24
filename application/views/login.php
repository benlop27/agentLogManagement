<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>OneLink El Salvador</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container" >
    	
    <?php 
      echo form_open('login_Controller/validate', array('class' => 'form-signin', 'method'=>'POST'));

      echo "<h2 class='form-signin-heading'>OneLink El Salvador <br> Inicie Sesión</h2>";
$datos = array('name' => 'nickname_usuario', 'type' => 'text','placeholder'=>'usuario', 'class'=>'form-control');

echo form_input($datos);
echo '<br>';
echo form_input(array('type' => 'password', 'name' => 'password_usuario', 'placeholder'=>'password','class'=>'form-control'));
echo '<br>';

  echo form_input(array('name' => 'boton' ,'value'=>'iniciar', 'type'=>'submit', 'class' => 'btn btn-lg btn-primary btn-block'));
  
     ?>
      
      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>