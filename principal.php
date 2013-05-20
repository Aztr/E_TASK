<?php
include_once 'config.inc.php';
include_once 'sw/Sesion.php';
include_once 'ControladorPrincipal.php';
include_once 'sw/ServicioObjeto.php';
include_once 'sw/ServicioTarea.php';
include_once 'sw/ServicioTecnica.php';
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
        <script type="text/javascript" language="javascript" src="js/jquery-1.6.4.js" ></script>
        <script type="text/javascript" language="javascript" src="js/jquery.form.js" ></script>
        <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>
        <script type="text/javascript" language="javascript" src="js/functions.js" ></script>
        <script type="text/javascript" language="javascript" src="js/ajax.js" ></script>

    </head>
    <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
        <?php
        $controladorPrincipal = ControladorPrincipal::getInstance();
        if ($controladorPrincipal->getNumCampos() > 0)
            $controladorPrincipal->registraFormulario();
        ?>
        <div class="container">	
            <div id="wrapper">
                <header>
                    <h1>BIENVENIDO A  <span>E-Task</span></h1>
                </header>
                <div id="header">
                    <div id="titleLeft">
                        <?php
                        $_SESSION['idTarea'] = $controladorPrincipal->obtenerIdTarea(0);
                        echo $controladorPrincipal->obtenerIdTarea(0);
                        echo ". " . $controladorPrincipal->obtenerNombreTarea(0);
                        ?>
                    </div>
                    <div id="titleRight">
                        <form action = 'sw/cerrarSesion.php' method = 'POST'>

                            <p class="button"> 
                                <input class='button' type = 'submit' name = 'logout' value = 'Salir'>
                            </p>

                        </form>
                    </div>
                    <br class="clearfloat" />           
                </div>
                <div id="subContainerOne">
                    <div id="subContainerTwo">            
                        <div id="leftBar">
                            <?php $servicioObjeto = new ServicioObjeto(1); ?>									
                            <p><?php echo $servicioObjeto->getNombreObjeto() ?></p>	
                            <p><?php echo $servicioObjeto->getDireccionObjeto() ?></p>		
                        </div>           
                        <div id="workArea">
                            <div id ="instrucciones" onclick="oculta()">
                                <p>instrucciones</p>
                                <?php
                                $instrucciones = $controladorPrincipal->obtenerInstrucciones(0);
                                echo $instrucciones;
                                ?>


                            </div>                    

                            <div id ="contenidoUno">
                                <form method="POST"  action="<?php echo $_SERVER['PHP_SELF'] ?>" name="formulario">
                                    <?php
                                        $servicioTarea=$controladorPrincipal->getServicioTarea();
                                        $numCampos=$servicioTarea->obtenerCamposEnOrden(0);
                                        if($numCampos!=null){
                                            echo $controladorPrincipal->generarFormulario();
                                            $cadena="<p class=\"button\"><input class='button' type='button' value=\"Enviar\" onclick=\"showUser(1);\"></p>";
                                            echo $cadena;
                                        }
                                    ?>
                                </form>
                            </div>                    
                            <!-- 
                            <div id ="encabezadoDos">
                                <button>ocultar contenido</button>
                            </div> 
                            -->                    
                            <div id="contenidoDos">
                                <div id="txtHint"></div>
                            </div>

                            <div id="piePagina">                       
                                <? //php include('footpage.php');   ?>
                            </div>  

                        </div> 

                        <br class="clearfloat" />
                    </div>
                    <p class="button"> 
                        <input class='button' type = 'submit' name = 'Instrucciones' value = 'Instrucciones' onclick="oculta()">
                    </p>
                    <form action = 'sw/TareaSiguiente' method = 'POST'>
                        <p class="button"> 
                            <input class='button' type = 'submit' name = 'Siguiente' value = 'Siguiente'>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function showUser()
            {
                
                var numero = <?php
                                echo $controladorPrincipal->getNumCampos();
                                ?>;
                                        var arregloID = new Array(numero);
                                        var arregloValor = new Array(numero);
                                        for(i = 0; i<numero;i++){
                                            arregloID[i]= document.getElementById("campo"+[i]).name;
                                            arregloValor[i]= document.getElementById("campo"+[i]).value;
                                        }
                
                
                                        if (arregloID.length!=numero)
                                        {

                                            document.getElementById("txtHint").innerHTML="";
                                            return;
                                        } 
                                        if (window.XMLHttpRequest)
                                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                                            xmlhttp=new XMLHttpRequest();
                                        }
                                        else
                                        {// code for IE6, IE5
                                            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                        }
                                        xmlhttp.onreadystatechange=function()
                                        {
                                            if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                            {

                                                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                                            }
                                        }
                                        xmlhttp.open("GET","getDatos.php?q="+arregloID+"&&r="+arregloValor,true);
                                        xmlhttp.send();
                                    }
        </script>

        <script>
            function limpia(elemento)
            {
                elemento.value = "";
            }
        </script>
    </body>
</html>