<?php

session_start();
$ids = $_GET["idsBorrar"];
$idsCampos = $_GET["idsCampos"];

$con = mysql_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("experiment_tsp", $con);
$arregloIDs = explode(',', $ids);
$arregloIDCampos = explode(',', $idsCampos);

foreach ($arregloIDs as $indice => $datoID) {
    $mysql = "DELETE FROM `resultados_tareas` WHERE `id`=".$datoID;
    mysql_query($mysql);
}


$sql = "SELECT * FROM campos_tarea WHERE tarea_id='" . $_SESSION['idBD'] . "';";
$result = mysql_query($sql);

echo "<table border='1'><tr>";
while ($row = mysql_fetch_array($result)) {
    echo "<th>" . $row['nombre_campo'] . "</th>";
}
echo "</tr>";

$sql = "SELECT * FROM resultados_tareas WHERE usuario_id='" . $_SESSION['usuarioId'] . "';";
$resultado = mysql_query($sql);
$tamano = count($arregloIDCampos);

$bandera = 0;
$ids = "";
while ($row = mysql_fetch_array($resultado)) {
    if ($bandera == 0) {
        echo "<tr>";
    }
    
    for ($i = 0; $i < $tamano; $i++) {
        if ($arregloIDCampos[$i] == $row['campos_tarea_id']) {
            $ids = $ids.$row['id'];
            if($i+1 < $tamano){
                $ids = $ids.",";
            }
            echo "<td>" . $row['valor'] . "</td>";
        }
    }
    $bandera++;
    if ($bandera == $tamano) {
        echo "<td width=\"15\" background=\"images/tacha.gif\" onclick=\"eliminarDatos('".$ids."');\">&nbsp;</td>";
        echo "</tr>";
        $bandera = 0;
        $ids = "";
    }
}
echo "</table>";

mysql_close($con);
?>