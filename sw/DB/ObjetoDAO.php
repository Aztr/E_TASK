<?php

     include_once 'ConexionGeneral.php';
     include_once 'sw\domain\ObjetoExperimental.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObjetoDAO
 *
 * @author Roguelider
 */
class ObjetoDAO extends ConexionGeneral{

    public function seleccionarObjetoPorId($idObjeto) {
        $conexion=$this->abrirConexion();        
        $sql = "SELECT * FROM objeto_experimental WHERE id ='" . mysql_real_escape_string($idObjeto) . "'";
        //echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $Objeto=null;
        while ($fila = mysql_fetch_array($resultado)) {
            $Objeto = new ObjetoExperimental($fila["id"],$fila["nombre"], $fila["ruta"],$fila["tipo_recurso_id"],$fila["cantidad_defectos"],$fila["descripcion"]);
            return $Objeto;
        }
        $this->cerrarConexion($conexion);        
        return $Objeto;
    }
}

?>
