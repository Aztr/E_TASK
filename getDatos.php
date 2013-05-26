<?php
include_once 'config.inc.php';
session_start();
$q = $_GET["q"];
$r = $_GET["r"];
//echo $q.$r;
$con = mysql_connect($GLOBALS["servidor"], $GLOBALS["usuarioDB"], $GLOBALS["contrasenaDB"]);
//$link = mysqli_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($GLOBALS["base_datos"], $con);
$arregloID = explode(',', $q);
$arregloValor = explode(',', $r);

foreach ($arregloID as $indice => $datoID) {
    $datoValor = $arregloValor[$indice];
    $mysql = "INSERT INTO `resultados_tareas` (`valor`, `usuario_id`,`campos_tarea_id`,`numero_transaccion`) VALUES ('" . @mysql_escape_string($datoValor) . "'," . $_SESSION['usuarioId'] . "," . $datoID . ",0);";
//    echo $mysql;
    mysql_query($mysql);
}

$sql = "SELECT * FROM campos_tarea WHERE tarea_id='" . ($_SESSION['idBD']). "';";
//echo $sql;
$result = mysql_query($sql);
$campos_tareas = array();
echo "<table id=\"rounded-corner\" border='1'><tr>";
while ($row = mysql_fetch_array($result)) {
    $campos_tareas[count($campos_tareas)]= $row;
    echo "<th>" . $row['nombre_campo'] . "</th>";
}
if(count($campos_tareas)>0){
    echo "<th>Eliminar</th>";
}
echo "</tr>";


$sql = "SELECT * FROM resultados_tareas where usuario_id='".$_SESSION['usuarioId'] ."'  ORDER BY ID";
//echo $sql;
$resultado = mysql_query($sql);
$tamano = count($campos_tareas);
$bandera = 0;
$ids = "";
while ($row = mysql_fetch_array($resultado)) {
    $vacio = true;
    if ($bandera == 0) {
        echo "<tr>";
    }
    for ($i = 0; $i < $tamano; $i++) {
        if ($campos_tareas[$i]['id'] == $row['campos_tarea_id']) {
            $ids .= $row['id'];
            if($i+1 < $tamano){
                $ids .= ",";
            }
            echo "<td>" . $row['valor'] . "</td>";
            $vacio=false;
        }
    }
    if(!$vacio){
        $bandera++;
    }

    if ($bandera == $tamano) {
        echo "<td onclick=\"eliminarDatos('".$ids."');\"><img src=\"images/tacha.gif\"></img></td>";
        echo "</tr>";
        $bandera = 0;
        $ids = "";
    }
}
echo "</table>";

mysql_close($con);
?>