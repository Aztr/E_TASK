<?php

include_once 'sw/ServicioTecnica.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorPrincipal
 *
 * @author Roguelider
 */
class ControladorPrincipal {
    private $servicioTecnica;
    
    public function __construct() {
        $this->servicioTecnica=new ServicioTecnica("Tecnica de prueba");
    }
    
    public function obtenerInstrucciones($tareaActual){
        
        $tarea=$this->servicioTecnica->obtenerTareaEnOrden($tareaActual);
        return $tarea->getInstrucciones();
    }
    public function obtenerNombreTarea($tareaActual){
        $tarea=$this->servicioTecnica->obtenerTareaEnOrden($tareaActual);
        return $tarea->getNombre();
    }
}

?>
