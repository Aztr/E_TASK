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
    
    public static function getInstance($nombreTecnica,$idTarea){
        if (  !self::$instancia instanceof self)
      {
         self::$instancia = new ControladorPrincipal($nombreTecnica,$idTarea);
      }
      return self::$instancia;
    }
    
    private function __construct($nombreTecnica,$idTarea) {
        $this->servicioTecnica=new ServicioTecnica($nombreTecnica);
        $this->servicioTarea=new servicioTarea($nombreTecnica,$idTarea);
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
    
        public function obtenerIdTarea($tareaActual){
        $tarea=$this->servicioTecnica->obtenerTareaEnOrden($tareaActual);
        return $tarea->getIdTarea();
    }
    public function generarFormulario(){
        $cadena="";
        $i=0;
        $this->camposEnTarea=0;
        $campo=$this->servicioTarea->obtenerCamposEnOrden($i);
        do{
            $cadena=$cadena."<p>".$campo->getNombreCampo().": <input id=\"campo".$i."\" name=\"".$campo->getId()."\" type=\"text\" onclick=\"javascript: limpia(this);\"/> </p>";
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
    public function getServicioTarea(){
        return $this->servicioTarea;
    }
}

?>
