<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObjetoExperimental
 *
 * @author Roguelider
 */
class ObjetoExperimental {
    //put your code here
    
    private $id;
    private $nombre;
    private $ruta;
    private $tipoRecurso;
    private $cantidadDefectos;
    private $descripcion;
    
    public function __construct($id,$nombre,$ruta, $tipoRecurso,$cantidadDefectos,$descripcion) {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->ruta=$ruta;
        $this->tipoRecurso=$tipoRecurso;
        $this->cantidadDefectos=$cantidadDefectos;
        $this->descripcion=$descripcion;
        
    }
    
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getRuta(){
        return $this->ruta;
    }
    public function getTipoRecurso(){
        return $this->tipoRecurso;
    }
    public function getCantidadDefectos(){
        return $this->cantidadDefectos;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function setID($id){
        $this->id=$id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setRuta($ruta){
        $this->ruta=$ruta;
    }
    public function setTipoRecurso($tipoRecurso){
        $this->tipoRecurso=$tipoRecurso;
    }
    public function setCantidadDefectos($cantidadDefectos){
        $this->cantidadDefectos=$cantidadDefectos;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
}

?>
