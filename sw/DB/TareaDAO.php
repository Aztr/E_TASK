<?php
     include_once 'ConexionGeneral.php';
     include_once 'sw\domain\Tarea.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TareaDAO
 *
 * @author Roguelider
 */
class TareaDAO extends ConexionGeneral{

        public function seleccionarTareasPorIdTecnica($idTecnica) {
        $conexion=$this->abrirConexion();        
        $sql = "SELECT * FROM tarea WHERE tecnica_id ='" . mysql_real_escape_string($idTecnica) . "'";
        //echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $tarea=null;
        $tareas=array();
        $i=0;
        while ($fila = mysql_fetch_array($resultado)) {
            $tarea = new Tarea($fila["id"],$fila["orden"],$fila["nombre"], $fila["instrucciones"]);
             array_push($tareas,$tarea);
             $i++;
        }
        return $tareas;
        $this->cerrarConexion($conexion);        
        
        
    }

}

?>
