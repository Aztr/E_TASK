<?php
include_once '../config.inc.php';
include_once 'DB/AsignacionDAO.php';
session_start();
$dao=new AsignacionDAO();
$mysqldate = date('Y-m-d H:i:s');
//idBD
//$dao->finDuracionTarea($_SESSION['usuarioId'], $_SESSION['idTarea'],$mysqldate);
$dao->finDuracionTarea($_SESSION['usuarioId'], $_SESSION['idBD'],$mysqldate);
$_SESSION['idTarea']=$_SESSION['idTarea']+1;
$dao->modificaTarea($_SESSION['idTarea'],$_SESSION['idAsignacion']);
header("Location: " . $GLOBALS['raiz_sitio'] . "principal.php");
?>