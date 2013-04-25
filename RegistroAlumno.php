<?php
include_once 'config.inc.php';
include_once 'sw/DB/ConexionGeneral.php';
include_once 'ControladorAlumno.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Registro</title>
        <script type="text/javascript" language="javascript" src="js/jquery-1.6.4.js" ></script>
        <script type="text/javascript" language="javascript" src="js/jquery.form.js" ></script>
    </head>
    <body>    
        <div class="encabezado" id="encabezado">
        </div>
        <div class="contenido">
            <h1>Registro</h1>
            <!--                    include_php/_gestion_login.php-->
            <form  method="get" id="form_reg_alum" action="ControladorAlumno.php" >
                <table class="registro" cellpadding="0" cellspacing="0">
                    <tr>
                        <td> Nombre(s):</td>                          	  
                        <td> <input type="text" name="nombre" id="nombre" value="" /></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno:</td>    
                        <td> <input type="text" name="apellidoP" id="apellidoP" value="" /></td>
                    </tr>
                    <tr>
                        <td> Apellido Materno:</td>    
                        <td> <input type="text" name="apellidoM" id="apellidoM" size="20" maxlength="46"  value="" /></td>
                    </tr>
                    <tr>
                        <td> Matr&iacute;cula:</td>     
                        <td> <input type="text" name="matricula" id="matricula" size="20" maxlength="46"   value="" /></td>
                    </tr>
                    <tr>
                        <td>Contrase&ntilde;a:</td>    
                        <td> <input type="password" name="contrasena" id="password" value="" /></td>
                    </tr>
                    <tr>
                        <td>Confirma tu contrase&ntilde;a:</td>
                        <td><input type="password"  name="cpassword" id="cpassword" value="" /></td>
                    </tr>
                    <tr>
                        <td></td>                            
                    </tr>
                    <tr>
                        <input type="hidden" name="login" value="login"/>
                        <td  colspan="2"><input type="submit"  name="btn_registrar" class="boton"  id="registrar" value="Registrar"/></td>
                    </tr>                    
                </table>
            </form>
        </div>
    </body>
</html>
