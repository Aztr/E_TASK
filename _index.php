<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
$sesion=new Sesion();
$sesion->sesionActiva();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Login</title>

        
        
    </head>
    <body>    
            <div class="encabezado" id="encabezado">
                    <div class="slogan"><a href="#">Bienvenido</a></div>
            </div>
        <div class="contenido">
                    <h1>Iniciar Sesi&oacute;n</h1>
                    <?php
                        
                        echo $sesion->iniciarSesion();
                    ?>
                    <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                        <table>
                            <tr>
                                <td><label for="usuario">Usuario :<span>(Matr&iacute;cula)</span></label></td>                          	
                            </tr>
                            <tr>
                                <td><input type="text" id="usuario" name="matricula"/></td>
                            </tr>
                            <tr>
                                <td><label for="password">Contrase&ntilde;a : </label></td>                          	
                            </tr>
                            <tr>
                                <td><input type="password" id="password" name="contrasena" /></td>
                            </tr>
                            <tr>
                                <td></td>                            
                            </tr>
                            <tr>
                                <input type="hidden" name="login" value="login"/>
                                <td ><input type="submit" class="boton"  id="acceder" value="Iniciar sesi&oacute;n" name="btn_sesion"/></td>
                            </tr>                    
                        </table>
                    </form>
                <h2>¿Nuevo?</h2>
                <a href="RegistroAlumno.php">Registrate aqui!</a>
        </div>
    </body>
</html>
