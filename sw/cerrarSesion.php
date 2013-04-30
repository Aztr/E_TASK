<?php

if (isset($_POST["logout"])) {
    session_start();
    //Se limpian las variables almacenadas en la sesión
    $_SESSION = array();
    session_destroy();
}

header("location: ../index.php");
    exit;

?>
