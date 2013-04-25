<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
$sesion = new Sesion();
$sesion->filtro_login();


?>      
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Principal</title>
    </head>
    <body>
        <div class="encabezado">  
        </div>       
        <div class="contenido" >
            <h1>Bienvenido</h1>
        </div>
    </body>
</html>
