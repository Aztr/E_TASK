<?php

include_once 'ConexionGeneral.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefectosDAO
 *
 * @author Angel
 */
class DefectosDAO extends ConexionGeneral {
    public function obtenerTipoDefecto() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM  `tipo_defecto` ";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $tipos_defect = null;
        while ($fila = mysql_fetch_array($resultado)) {
            $tipos_defect[count($tipos_defect)] = $fila;
        }
        $this->cerrarConexion($conexion);
        return $tipos_defect;
    }
    
    //put your code here
    public function obtenerTipoDetecDefecto() {
        $conexion = $this->abrirConexion();
        $sql = "SELECT * FROM  `tipo_deteccion_defectos` ";
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $tipos_defect = null;
        while ($fila = mysql_fetch_array($resultado)) {
            $tipos_defect[count($tipos_defect)] = $fila;
        }
        $this->cerrarConexion($conexion);
        return $tipos_defect;
    }

    public function insertarDefectoEncontrado($describicion, $id_asignacion,$tipo_defecto, $tipo_deteccion) {
        $conexion = $this->abrirConexion();
        $sql = "
INSERT INTO  `experiment_tsp`.`defectos_encontrados` (
`descripcion` ,
`asignaciones_id` ,
`tipo_defecto_id` ,
`tipo_deteccion_defectos_id`
)
VALUES ('$describicion',  '$id_asignacion',  '$tipo_defecto',  '$tipo_deteccion'
);

";
//        echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $this->cerrarConexion($conexion);        
    }

}

?>
