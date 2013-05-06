<?php

     include_once 'ConexionGeneral.php';
     include_once 'sw\domain\Tecnica.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TecnicaDAO
 *
 * @author Roguelider
 */

class TecnicaDAO extends ConexionGeneral{

       public function seleccionarTecnicaPorNombre($nombreTecnica) {
        $conexion=$this->abrirConexion();        
        $sql = "SELECT * FROM tecnica WHERE nombre ='" . mysql_real_escape_string($nombreTecnica) . "'";
        //echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $Tecnica=null;
        while ($fila = mysql_fetch_array($resultado)) {
            $Tecnica = new Tecnica($fila["id"],$fila["nombre"], $fila["descripcion"]);
            return $Tecnica;
        }
        $this->cerrarConexion($conexion);        
        return $Tecnica;
    }
      
}

?>
