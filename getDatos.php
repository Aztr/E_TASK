<?php

$q = $_GET["q"];
$r = $_GET["r"];

$con = mysql_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("experiment_tsp", $con);
$mysql = "INSERT INTO `resultados_tareas` (`valor`, `usuario_id`, `campos_tarea_id`) VALUES (" . $q .
                ",1,6);";
mysql_query($mysql);
$mysqll = "INSERT INTO `resultados_tareas` (`valor`, `usuario_id`, `campos_tarea_id`) VALUES (" . $r.
                ",1,7);";
mysql_query($mysqll);

$sql = "SELECT * FROM resultados_tareas";
//    WHERE usuarioId = '".$q."'";
$sql;
$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>No. de Línea</th>
<th>Descripción</th>
</tr>";

while ($row = mysql_fetch_array($result)) {
    if ($row['campos_tarea_id'] == 6) {
        echo "<tr>";
        echo "<td>" . $row['valor'] . "</td>";
    } else if ($row['campos_tarea_id'] == 7) {
        echo "<td>" . $row['valor'] . "</td>";
        echo "</tr>";
    }
}
echo "</table>";

mysql_close($con);
?>