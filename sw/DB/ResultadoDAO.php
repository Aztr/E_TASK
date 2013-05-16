<?php

     include_once 'ConexionGeneral.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoDAO
 *
 * @author Roguelider
 */
class ResultadoDAO extends ConexionGeneral{
    //put your code here
    
        public function insertarValorCampo($valor, $usuario, $campo) {
        $registroExitoso = false;
        $conexionDB = $this->abrirConexion();
        $sql = "INSERT INTO `resultados_tareas` (`valor`, `usuario_id`, `campos_tarea_id`) VALUES (" . $valor .
                ",".$usuario."," . $campo . ");";
//        echo $sql;
        if ($this->ejecutarConsulta($sql, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }
}
?>
