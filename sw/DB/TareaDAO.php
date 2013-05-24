<?php
     include_once 'ConexionGeneral.php';
     include_once 'sw\domain\Tarea.php';
     include_once 'sw\domain\CampoTarea.php';

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
        $sql = "SELECT * FROM tarea WHERE tecnica_id ='" . mysql_real_escape_string($idTecnica) . "' order by orden";
//        echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $tarea=null;
        $tareas=array();
        $i=0;
        
        while ($fila = mysql_fetch_array($resultado)) {
//            echo json_encode($fila)."<br>";
            $tareas[count($tareas)] = new Tarea($fila["id"],$fila["orden"],$fila["nombre"], $fila["instrucciones"]);
//             array_push($tareas,$tarea);
             $i++;
        }
//        echo json_encode($tareas);
        return $tareas;
        $this->cerrarConexion($conexion);               
    }
    
    public function seleccionarCamposPorTarea($idTarea){

        $conexion=$this->abrirConexion();
        $sql="SELECT * FROM campos_tarea WHERE tarea_id ='" . mysql_real_escape_string($idTarea) . "'";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $campo=null;
        $campos=array();
        $i=0;
        while ($fila = mysql_fetch_array($resultado)) {
            $campo = new CampoTarea($fila["id"],$fila["nombre_campo"]);
             array_push($campos,$campo);
             $i++;
        }
        return $campos;
        $this->cerrarConexion($conexion); 
    }

}

?>
