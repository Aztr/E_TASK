<?php
include_once 'config.inc.php';
include_once 'sw/ServicioAsignacion.php';
include_once 'sw/Sesion.php';
include_once 'ControladorPrincipal.php';
include_once 'sw/ServicioObjeto.php';
include_once 'sw/ServicioTarea.php';
include_once 'sw/ServicioTecnica.php';
include_once 'sw/ServicioDefectos.php';
$sesion = new Sesion();
$sesion->filtro_login();
if (isset($_GET['tecnica'])) {
    $servicioAsignacion = new ServicioAsignacion();
    $asiganciones = ($servicioAsignacion->obtenerAsignacion());
    for ($i = 0; $i < count($asiganciones); $i++) {
        if (strcmp(trim($asiganciones[$i]['nombre']), trim($_GET['tecnica'])) == 0) {
            $_SESSION['nombreTecnica'] = $_GET['tecnica'];
            $_SESSION['idTarea'] = $asiganciones[$i]['id_ultima_tarea'];
            $_SESSION['idAsignacion'] = $asiganciones[$i]['id'];
            break;
        }
    }
}
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
        <link rel="stylesheet" type="text/css" href="css/tablas2.css" />
        <script type="text/javascript" language="javascript" src="js/jquery-1.6.4.js" ></script>
        <script type="text/javascript" language="javascript" src="js/jquery.form.js" ></script>
        <script type="text/javascript" language="javascript" src="js/js_index.js" ></script>
        <script type="text/javascript" language="javascript" src="js/functions.js" ></script>
        <script type="text/javascript" language="javascript" src="js/ajax.js" ></script>
        <script type="text/javascript" language="javascript" src="js/addDefectos.js" ></script>

    </head>
    <body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
        <?php
        $controladorPrincipal = ControladorPrincipal::getInstance($_SESSION['nombreTecnica'], $_SESSION['idTarea']);
        $servicioAsignacion = new ServicioAsignacion();
        $_SESSION['idBD'] = $controladorPrincipal->obtenerIdTarea($_SESSION['idTarea']);
        ?>
        <div class="container">	
            <div id="wrapper">
                <header><h1>
                        <?php
                        echo "Tarea: " . $controladorPrincipal->obtenerNombreTarea($_SESSION['idTarea']);
                        ?></h1>
                </header>
                <div id="header">

                    <div id="titleLeft">
                        <?php
//                        $_SESSION['idBD'] = $controladorPrincipal->obtenerIdTarea($_SESSION['idTarea']);
                        $servicioAsignacion->registrarInicioTarea($_SESSION['idBD']);
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
                        <div id="leftBar" style="word-wrap: break-word; white-space: -moz-pre-wrap; word-wrap: break-word;
display:inline-block;">
                            <?php $servicioObjeto = new ServicioObjeto(1); ?>									
                            <p style="word-wrap: break-word; white-space: -moz-pre-wrap; word-wrap: break-word;
display:inline-block;"><?php echo $servicioObjeto->getNombreObjeto() ?></p>	
                            <p style="word-wrap: break-word; white-space: -moz-pre-wrap;word-wrap: break-word;
display:inline-block; ">
                                <?php
                                try {
                                    if (is_file($servicioObjeto->getDireccionObjeto())) {
                                        $raw = file_get_contents($servicioObjeto->getDireccionObjeto());

                                        echo '<pre style="word-wrap: break-word; ">';
                                        echo str_replace("[\n]", "<br>", $raw);
                                        echo '</pre>';
                                    } else {
                                        echo '<pre style="word-wrap: break-word; ">Archivo fuente no encontrado</pre>';
                                    }
                                } catch (Exception $e) {
                                    echo '<pre>Archivo fuente no encontrado</pre>';
                                }
                                ?>                            </p>		
                        </div>           
                        <div id="workArea">
                            <div id ="instrucciones" onclick="oculta()">
                                <p>instrucciones</p>
                                <?php
                                $instrucciones = $controladorPrincipal->obtenerInstrucciones($_SESSION['idTarea']);
                                echo $instrucciones;
                                ?>


                            </div>                    

                            <div id ="contenidoUno">
                                <form method="POST"  action="<?php echo $_SERVER['PHP_SELF'] ?>" name="formulario">
                                    <?php
                                    $servicioTarea = $controladorPrincipal->getServicioTarea();
                                    $numCampos = $servicioTarea->obtenerCamposEnOrden(0);
                                    if ($numCampos != null) {
                                        echo $controladorPrincipal->generarFormulario();
                                        $cadena = "<p class=\"button\"><input class='button' type='button' value=\"Enviar\" onclick=\"showUser();\"></p>";
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
                                <?
                                $servDefe = new ServicioDefectos();
                                ?>
                                <form id="form_reg_defect" name="form_reg_defect" method="POST" action="sw/ServicioDefectos.php">                                                                       
                                    <h1>
                                        Registrar defecto
                                        <br/>
                                        <br/>
                                        <input id="Defecto" name="descripcion" required="required" type="text" placeholder="Describcion del defecto"/> 
                                        <br/>
                                        <br/>
                                        <input type="hidden" name="id_asig" value="<?php echo $_SESSION['idAsignacion'] ?>" />
                                        <label for="Tipo" style="font-size: 18px" > Tipo de detección </label>
                                        <select id="Tipo" required="required" name="tipo_deteccion_defectos" id="username" >
                                            <?
                                            $tiposDef = $servDefe->obtenerTiposDetectDefectos();
                                            for ($i = 0; $i < count($tiposDef); $i++) {
                                                echo '<option value="' . $tiposDef[$i]['id'] . '">' . $tiposDef[$i]['nombre'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <label for="Tipo" style="font-size: 18px" > Tipo de defecto </label>
                                        <select id="Tipo" required="required" name="id_tipo_detec" id="username" >
                                            <?
                                            $tiposDef = $servDefe->obtenerTiposDefectos();
                                            for ($i = 0; $i < count($tiposDef); $i++) {
                                                echo '<option value="' . $tiposDef[$i]['id'] . '">' . $tiposDef[$i]['nombre_defecto'] . '</option>';
                                            }
                                            ?>
                                        </select>

                                        <p class="button"> 
                                            <br/>
                                            <input name ="Reg_def" class='button' type="submit"  value = 'Registrar'>
                                        </p>
                                    </h1>
                                </form>
                            </div>  

                        </div> 

                        <br class="clearfloat" />
                    </div>
                    <p class="button"> 
                        <input class='button' type = 'submit' name = 'Instrucciones' value = 'Instrucciones' onclick="oculta()">
                    </p>
                    <form action = 'sw/TareaSiguiente.php' method = 'POST'>
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
            if(arregloValor[i]==""){
                alert("Es necesario rellenar todos los campos en el formulario.");
                return;
            }
                                            
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
        xmlhttp.open("GET","getDatos.php?q="+arregloID+"&r="+arregloValor,true);
        xmlhttp.send();
    }
        </script>

        <script>
            function limpia(elemento)
            {
                elemento.value = "";
            }
        </script>

        <script>
            function eliminarDatos(ids)
            {
                if(window.confirm("Esta seguro que desea eliminarlo?")){
                    var arregloIDs = ids.split(",");
                    
                    var numero = <?php echo $controladorPrincipal->getNumCampos(); ?>;
                    var arregloID = new Array(numero);
                    for(i = 0; i<numero;i++){
                        arregloID[i]= document.getElementById("campo"+[i]).name;
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
                    xmlhttp.open("GET","borrar.php?idsCampos="+arregloID+"&&idsBorrar="+arregloIDs,true);
                    xmlhttp.send();
                }
            }
        </script>

    </body>
</html>