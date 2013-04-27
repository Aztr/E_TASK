<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
$sesion = new Sesion();
$sesion->sesionActiva();
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
        <title>Inicio de Sesión</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <script type="text/javascript" language="javascript" src="js/jquery-1.6.4.js" ></script>
        <script type="text/javascript" language="javascript" src="js/jquery.form.js" ></script>
        <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>BIENVENIDO A  <span>E-Task</span></h1>
            </header>
            <section>				
                <div id="container_demo" >
                    <?php
                    echo $sesion->iniciarSesion();                    
                    ?>
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="POST"  action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="on"> 
                                <h1>Ingreso de Usuarios</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Nombre de Usuario </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Mi usuario"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Contraseña </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input name="login" type="submit" value="Entrar" /> 
                                </p>
                                <p class="change_link">
                                    ¿No cuenta con un nombre de usuario?
                                    <a href="#toregister" class="to_register">Regístrese aquí</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form id="form_reg_" action="ControladorAlumno.php" autocomplete="on"> 
                                <h1> Formulario de Registro </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u"> Nombre(s) </label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="Nombre(s) del usuario" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u"> Apellidos </label>
                                    <input id="usernamesignup" name="usernamelast" required="required" type="text" placeholder="Apellidos del usuario" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Usuario </label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="text" placeholder="Usuario"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p"> Contraseña </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p"> Confirmar su contraseña </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
                                    <input name="btn_registrar" id="registrar" type="submit" value="Registrarse"/> 
                                </p>
                                <p class="change_link">  
                                    ¿Ya tiene una cuenta?
                                    <a href="#tologin" class="to_register"> Iniciar sesión</a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>