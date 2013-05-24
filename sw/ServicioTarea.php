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
         $this->obtenerTarea($nombreTecnica,$tareaActual);
         $this->obtenerCampos($this->tarea->getIdTarea());
    }
    
        private function obtenerTarea($nombreTecnica,$tareaActual){
         $servicioTecnica=new ServicioTecnica($nombreTecnica);

         $this->tarea=$servicioTecnica->obtenerTareaEnOrden($tareaActual);

     }
     private function obtenerCampos($idTarea){
         $tareaDAO=new TareaDAO();
         
         $this->campos=$tareaDAO->seleccionarCamposPorTarea($idTarea);
     }
     
          public function getTarea(){
         return $this->tarea;
     }
     public function obtenerCamposEnOrden($campoActual){

         if($campoActual<sizeof($this->campos))
         return $this->campos[$campoActual];
         else return null;
     }
}

?>
