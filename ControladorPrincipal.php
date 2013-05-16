<?php

include_once 'sw/ServicioTecnica.php';
include_once 'sw/ServicioTarea.php';
include_once 'sw/DB/ResultadoDAO.php';
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
    private static $camposEnTarea;
    private $resultado;
    private static $instancia;
    
    public static function getInstance(){
        if(ControladorPrincipal::$instancia==null){
            ControladorPrincipal::$instancia=new ControladorPrincipal();
        }
        return ControladorPrincipal::$instancia;
    }
    
    private function __construct() {
        $this->servicioTecnica=new ServicioTecnica("Tecnica de prueba");
        $this->servicioTarea=new servicioTarea("Tecnica de prueba","0");
        $this->resultado=new ResultadoDAO();
        ControladorPrincipal::$camposEnTarea=0;
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
        ControladorPrincipal::$camposEnTarea=0;
        $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        do{
            $cadena=$cadena."<p>".$campo->getNombreCampo().": <input id=\"campo".$i."\" name=\"campo".$i."\" type=\"text\" /> </p>";
            ControladorPrincipal::$camposEnTarea+=1;
            $i+=1;
            $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        }while($campo!=null);
        return $cadena;
    }
    public function registraFormulario(){           
        for($i=0;$i<$this->camposEnTarea;$i++){
           $valor=$_Post["campo".$i];
           $this->resultado->insertarValorCampo($valor, 1, $i);
        }
        return $valor;
    }
    public function getNumCampos(){
        return ControladorPrincipal::$camposEnTarea;
    }
}

?>
