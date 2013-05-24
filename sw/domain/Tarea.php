<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tarea
 *
 * @author Roguelider
 */
class Tarea {
    public $idTarea;
    public $orden;
    public $nombre;
    public $instrucciones;
  
    public function __construct($idTarea,$orden, $nombre, $instrucciones) {
        $this->idTarea=$idTarea;
        $this->orden = $orden;
        $this->nombre = $nombre;
        $this->instrucciones = $instrucciones;
    }  
    
    public function getIdTarea(){
        return $this->idTarea;
    }
    public function getOrden(){
        return $this->orden;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getInstrucciones(){
        return $this->instrucciones;
    }

    public function setIdTarea($idTarea){
        $this->idTarea=$idTarea;
    }
    public function setOrden($orden){
        $this->orden=$orden;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setInstrucciones($instrucciones){
        $this->instrucciones=$instrucciones;
    }
}

?>
