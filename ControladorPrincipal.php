<?php

include_once 'sw/ServicioTecnica.php';
include_once 'sw/ServicioTarea.php';
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
    private $servicioTarea;
    
    public function __construct() {
        $this->servicioTecnica=new ServicioTecnica("Tecnica de prueba");
        $this->servicioTarea=new servicioTarea("Tecnica de prueba","0");
    }
    
    public function obtenerInstrucciones($tareaActual){
        
        $tarea=$this->servicioTecnica->obtenerTareaEnOrden($tareaActual);
        return $tarea->getInstrucciones();
    }
    public function obtenerNombreTarea($tareaActual){
        $tarea=$this->servicioTecnica->obtenerTareaEnOrden($tareaActual);
        return $tarea->getNombre();
    }
    public function generarFormulario(){
        $cadena="";
        $i=0;
        $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        do{
            $cadena=$cadena."<p>".$campo->getNombreCampo().": <input id=\"campo".$i."\" name=\"campo".$i."\" type=\"text\" /> </p>";
            $i++;
            $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        }while($campo!=null);
        return $cadena;
    }
}

?>
