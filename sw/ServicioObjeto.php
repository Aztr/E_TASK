<?php
include_once 'domain/ObjetoExperimental.php';
include_once 'DB/ObjetoDAO.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicioObjeto
 *
 * @author Roguelider
 */
class ServicioObjeto {
    //put your code here
    private $objeto=null;
    
    public function __construct($idObjeto) {
        $objetoDAO=new ObjetoDAO();
        $this->objeto=$objetoDAO->seleccionarObjetoPorId($idObjeto);
    }
    
    public function getNombreObjeto(){
        return $this->objeto->getNombre();
    }
    
    public function getDireccionObjeto(){
        return $this->objeto->getRuta();
    }
}

?>
