<?php

session_start();
$q = $_GET["q"];
$r = $_GET["r"];

$con = mysql_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("experiment_tsp", $con);
$arregloID = explode(',', $q);
$arregloValor = explode(',', $r);

foreach ($arregloID as $indice => $datoID) {
    $datoValor = $arregloValor[$indice];
    $mysql = "INSERT INTO `resultados_tareas` (`valor`, `usuario_id`,`campos_tarea_id`,`numero_transaccion`) VALUES ('" . $datoValor . "'," . $_SESSION['usuarioId'] . "," . $datoID . ",0);";
    mysql_query($mysql);
}


$sql = "SELECT * FROM campos_tarea WHERE tarea_id='" . $_SESSION['idBD'] . "';";
$result = mysql_query($sql);

echo "<table border='1'><tr>";
while ($row = mysql_fetch_array($result)) {
    echo "<th>" . $row['nombre_campo'] . "</th>";
}
echo "</tr>";


$sql = "SELECT * FROM resultados_tareas;";
$resultado = mysql_query($sql);
$tamano = count($arregloID);

$bandera = 0;
$ids = "";
while ($row = mysql_fetch_array($resultado)) {
    if ($bandera == 0) {
        echo "<tr>";
    }
    
    for ($i = 0; $i < $tamano; $i++) {
        if ($arregloID[$i] == $row['campos_tarea_id']) {
            $ids .= $row['id'];
            if($i+1 < $tamano){
                $ids .= ",";
            }
            echo "<td>" . $row['valor'] . "</td>";
        }
    }
    $bandera++;
    if ($bandera == $tamano) {
        echo "<td width=\"15\" background=\"images/tacha.gif\" onclick=\"eliminarDatos('" . $ids . "');\">&nbsp;</td>";
        echo "</tr>";
        $bandera = 0;
        $ids = "";
    }
}
echo "</table>";

mysql_close($con);
?>