<?php
include_once '../config.inc.php';
include_once 'DB/AsignacionDAO.php';
session_start();
$_SESSION['idTarea']=$_SESSION['idTarea']+1;
$dao=new AsignacionDAO();
$dao->modificaTarea($_SESSION['idTarea'],$_SESSION['idAsignacion']);
header("Location: " . $GLOBALS['raiz_sitio'] . "principal.php?"."Location: " . $GLOBALS['raiz_sitio'] . "principal.php");
?>