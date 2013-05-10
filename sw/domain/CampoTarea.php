<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CampoTarea
 *
 * @author Roguelider
 */
class CampoTarea {

     private $id;
     private $nombreCampo;
     
     public function __construct($id, $nombreCampo) {
         $this->id=$id;
         $this->nombreCampo=$nombreCampo;
     }
     
     public function getId(){
         return $this->id;
     }
     public function getNombreCampo(){
         return $this->nombreCampo;
     }
     public function setId($id){
         $this->id=$id;
     }
     public function setNombreCampo($nombreCampo){
         $this->nombreCampo=$nombreCampo;
     }
}

?>
