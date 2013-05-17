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
    private $camposEnTarea;
    private $resultado;
    private static $instancia;
    
    public static function getInstance(){
        if (  !self::$instancia instanceof self)
      {
         self::$instancia = new self;
      }
      return self::$instancia;
    }
    
    private function __construct() {
        $this->servicioTecnica=new ServicioTecnica("Tecnica de prueba");
        $this->servicioTarea=new servicioTarea("Tecnica de prueba","0");
        $this->resultado=new ResultadoDAO();
        if(isset($_POST['numeroCampos']))
        $this->camposEnTarea=$_POST['numeroCampos'];
        else
            $this->camposEnTarea=0;
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
        $this->camposEnTarea=0;
        $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        do{
            $cadena=$cadena."<p>".$campo->getNombreCampo().": <input id=\"campo".$i."\" name=\"campo".$i."\" type=\"text\" /> </p>";
            $this->camposEnTarea+=1;
            $i+=1;
            $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        }while($campo!=null);
        return $cadena;
    }
    public function registraFormulario(){           
        for($i=0;$i<$this->camposEnTarea;$i++){
           if(isset($_POST["campo".$i])){
            $valor=$_POST["campo".$i];
           $this->resultado->insertarValorCampo($valor, 1, $this->servicioTarea->obtenerCamposEnOrden($i)->getId());
           }
        }
    }
    public function getNumCampos(){
        return $this->camposEnTarea;
    }
}

?>
