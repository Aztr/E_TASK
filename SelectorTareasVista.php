<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
include_once 'sw/ServicioAsignacion.php';
//$sesion = new Sesion();
$sesion = new Sesion();
$sesion->filtro_login();
//$sesion->sesionActiva();
$servicioAsignacion = new ServicioAsignacion();
?>
<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/mensajes.css" />
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    <script type="text/javascript" language="javascript" src="js/jquery-1.6.4.js" ></script>
    <script type="text/javascript" language="javascript" src="js/jquery.form.js" ></script>
    <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>BIENVENIDO A  <span>E-Task</span></h1>
            <div id="header">



                <br class="clearfloat" />           
            </div>        
        </header>
        <section>				
            <div id="container_demo" >
                <?php
//                echo $sesion->iniciarSesion();
                ?>
                <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>

                <div id="wrapper">

                    <div id="login" class="animate form">
                        <form method="GET"  action="principal.php" autocomplete="on"> 
                            <h1>Seleccione su experimento</h1> 
                            <?php
                            $asiganciones = ($servicioAsignacion->obtenerAsignacion());
                            if (count($asiganciones) > 0) {
                                echo '<h1><select required="required" name="tecnica" id="username" placeholder="Mi usuario">';
                                for ($i = 0; $i < count($asiganciones); $i++) {
                                    echo '<option value="' . $asiganciones[$i]['nombre'] . '">' . $asiganciones[$i]['nombre'] . '</option>';
                                }
                                echo '</select>
                                <br/>
                                <p/>                              
                                <p class="button"> 
                                    <input id ="button_tecnica" type="submit"  value="Iniciar"/>
                                </p>
                            </h1>';
                            } else {
                                echo '<h1>NO hay experimentos asignados</h1> ';
                            }
                            ?>  


                            <?php
                            ?>
                            </p>
                        </form>
                        <form action = 'sw/cerrarSesion.php' method = 'POST'>
                            <p class="button"> 
                                <input class='button' type = 'submit' name = 'logout' value = 'Salir'>
                            </p>
                        </form>
                    </div>
                </div>
            </div>  
        </section>
    </div>
</body>

</html>