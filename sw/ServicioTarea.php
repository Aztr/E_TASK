<?php

include_once 'DB/TareaDAO.php';
include_once 'ServicioTecnica.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicioTarea
 *
 * @author Roguelider
 */
class ServicioTarea {
    //put your code here
    private $tarea;
    private $campos;
    
     public function __construct($nombreTecnica,$tareaActual){     
         $this->obtenerTecnica($nombreTecnica,$tareaActual);
         $this->obtenerTareas($this->tarea->getIdTarea());
    }
    
        private function obtenerTecnica($nombreTecnica,$tareaActual){
         $servicioTecnica=new ServicioTecnica($nombreTecnica);
         
         $this->tecnica=$servicioTecnica->obtenerTareaEnOrden($tareaActual);
     }
     private function obtenerTareas($idTarea){
         $tareaDAO=new TareaDAO();
         
         $this->campos=$tareaDAO->seleccionarCamposPorTarea($idTarea);
     }
     
          public function getTarea(){
         return $this->tarea;
     }
     public function obtenerCamposEnOrden($campoActual){

         return $this->campos[$campoActual];

     }
}

?>
