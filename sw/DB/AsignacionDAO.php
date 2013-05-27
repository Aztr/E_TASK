<?php

include_once 'ConexionGeneral.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AsignacionDAO
 *
 * @author Angel
 */
class AsignacionDAO extends ConexionGeneral {

//    public function obtenerAsignacion($idUsuario) {
//        $conexion = $this->abrirConexion();
//        $sql = "SELECT * FROM (`asignaciones` JOIN sesion ON sesion_id = sesion.id) 
//            JOIN tecnica ON asignaciones.tecnica_id = tecnica.id WHERE  `usuario_id` = '" . mysql_real_escape_string($idUsuario) . "'";
////        echo $sql;
//        $resultado = $this->ejecutarConsulta($sql, $conexion);
//        $asignaciones = array();
//        while ($fila = mysql_fetch_array($resultado)) {
//            echo count($asignaciones)+"  ";
//            $asignaciones[count($asignaciones)] = $fila;
//        }
//        $this->cerrarConexion($conexion);
//        return $asignaciones;
//    }
    public function obtenerAsignacion($idUsuario) {
        $conexion = $this->abrirConexion();
        $fecha_actual = date('Y-m-d H:i:s');

//$sql = "SELECT asignaciones.id ,nombre,fecha_inicio,fecha_fin,id_ultima_tarea FROM (`asignaciones` JOIN sesion ON sesion_id = sesion.id) 
//  JOIN tecnica ON asignaciones.tecnica_id = tecnica.id WHERE  `usuario_id` = '" . mysql_real_escape_string($idUsuario) . "'  AND  '$fecha_actual' > fecha_fin" ;
        $sql = "SELECT asignaciones.id ,tecnica.nombre,fecha_inicio,fecha_fin,id_ultima_tarea,tecnica_id FROM ((`asignaciones` JOIN sesion ON sesion_id = sesion.id)
            JOIN tecnica ON asignaciones.tecnica_id = tecnica.id )
            JOIN experimento ON asignaciones.experimento_id = experimento.id WHERE `usuario_id` =  '" . mysql_real_escape_string($idUsuario) . "'  AND `activo`!=0";
//        echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $asignaciones = array();
        while ($fila = mysql_fetch_array($resultado)) {
//            echo count($asignaciones)+"  ";
            $asignaciones[count($asignaciones)] = $fila;
        }
        $this->cerrarConexion($conexion);
        return $asignaciones;
    }

    public function getAsignacion($idAsignacion) {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM asignaciones WHERE  `id` = '" . mysql_real_escape_string($idAsignacion) . "'";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $asignaciones = array();
        while ($fila = mysql_fetch_array($resultado)) {
//            echo count($asignaciones) + "  ";
            $asignaciones[count($asignaciones)] = $fila;
        }
        $this->cerrarConexion($conexion);
        return $asignaciones;
    }

    public function modificaTarea($numTarea, $asignacion) {
        $conexion = $this->abrirConexion();
        $sql = "UPDATE asignaciones SET id_ultima_tarea=" . $numTarea . " WHERE id=" . $asignacion;
        $this->ejecutarConsulta($sql, $conexion);

        $this->cerrarConexion($conexion);
        return;
    }

    public function desactivaExperimento($numExp) {
//        $conexion=$this->abrirConexion(); 
////        $sql ="UPDATE experimento SET activo=" . 0 ." WHERE id=".$numExp;
////        $this->ejecutarConsulta($sql, $conexion);
//        
//        $this->cerrarConexion($conexion);        
        return;
    }

    public function finDuracionTarea($usuarioID, $tareaID, $fechaFin) {
        $conexion = $this->abrirConexion();
        $sqle = "UPDATE duracion_tarea SET fecha_fin='" . $fechaFin . "' WHERE usuario_id=" . $usuarioID . " and tarea_id=" . $tareaID;
        $this->ejecutarConsulta($sqle, $conexion);
        $this->cerrarConexion($conexion);
    }

    public function inicioDuracionTarea($usuarioID, $tareaID, $fechaInicio, $fechaFin) {
        $conexion = $this->abrirConexion();
        $sqle = "INSERT INTO duracion_tarea (usuario_id,tarea_id,fecha_inicio,fecha_fin) VALUES(" . $usuarioID . "," . $tareaID . ",'" . $fechaInicio . "','" . $fechaFin . "')";
        $this->ejecutarConsulta($sqle, $conexion);
        $this->cerrarConexion($conexion);
    }

}

?>
