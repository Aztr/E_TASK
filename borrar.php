<?php

session_start();
$ids = $_GET["idsBorrar"];

$con = mysql_connect('localhost', 'root', '');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("experiment_tsp", $con);
$arregloIDs = explode(',', $ids);

foreach ($arregloIDs as $indice => $datoID) {
    $mysql = "DELETE FROM `resultados_tareas` WHERE `id`=".$datoID;
    mysql_query($mysql);
}

$sql = "SELECT * FROM campos_tarea WHERE tarea_id='" . ($_SESSION['idBD']). "';";
//echo $sql;
$result = mysql_query($sql);
$campos_tareas = array();
echo "<table border='1'><tr>";
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