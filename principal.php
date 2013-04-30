<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
$sesion = new Sesion();
$sesion->filtro_login();
?>      

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Principal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        
    </head>
    <body>
        <div class="container">
            <header>
                <h1>BIENVENIDO A  <span>E-Task</span></h1>
            </header>
            <form action = 'sw/cerrarSesion.php' method = 'POST'>
                <div id="wrapper">
                    <p class="button"> 
                        <input class='button' type = 'submit' name = 'logout' value = 'Salir'>
                    </p>
                </div>
            </form>




        </div>
    </body>
</html>