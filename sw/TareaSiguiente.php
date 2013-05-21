<?php
session_start();
echo $_SESSION['idTarea'];
$_SESSION['idTarea']=$_SESSION['idTarea']+1;
header("Location: ../principal.php");
?>
