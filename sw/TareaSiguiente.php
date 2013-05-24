<?php
session_start();
$_SESSION['idTarea']=$_SESSION['idTarea']+1;
header("Location: " . $GLOBALS['raiz_sitio'] . "/E_TASK/principal.php");
?>
