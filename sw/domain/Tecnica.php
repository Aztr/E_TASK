<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tecnica
 *
 * @author Roguelider
 */
class Tecnica {
    
    private $idTecnica;
    private $nombre;
    private $desripcion;
    
    public function __construct($idTecnica,$nombre,$descripcion){
        $this->idTecnica=$idTecnica;
        $this->nombre=$nombre;
        $this->desripcion=$descripcion;
    }
    
    public function getIdTecnica(){
        return $this->idTecnica;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->desripcion;
    }
    
    public function setIdTecnica($idTecnica){
    $this->idTecnica=$idTecnica;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setDescripcion($descripcion){
        $this->desripcion=$descripcion;
    }
}

?>
