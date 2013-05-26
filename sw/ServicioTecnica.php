<?php

include_once 'DB/TecnicaDAO.php';
include_once 'DB/TareaDAO.php';
include_once 'DB/AsignacionDAO.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicioTecnica
 *
 * @author Roguelider
 */
class ServicioTecnica {
    
    private $tecnica;
    private $tareas;
    
     public function __construct($nombreTecnica){     
         $this->obtenerTecnica($nombreTecnica);
         $this->obtenerTareas($this->tecnica->getIdTecnica());
    }
    
    private function obtenerTecnica($nombreTecnica){
         $tecnicaDAO=new TecnicaDAO();         
         $this->tecnica=$tecnicaDAO->seleccionarTecnicaPorNombre($nombreTecnica);
     }
     private function obtenerTareas($idTecnica){
         $tareaDAO=new TareaDAO();
         
         $this->tareas=$tareaDAO->seleccionarTareasPorIdTecnica($idTecnica);
     }
     public function getTecnica(){
         return $this->tecnica;
     }
     public function obtenerTareaEnOrden($tareaActual){
         if($tareaActual<  sizeof($this->tareas)){
         return $this->tareas[$tareaActual];
             }else{
             //session_start();
                //Se limpian las variables almacenadas en la sesión
             $asignacionDAO=new AsignacionDAO();
             $asignacion=$asignacionDAO->getAsignacion($_SESSION['idAsignacion']);
             $id=$asignacion[0]['experimento_id'];
             $asignacionDAO->desactivaExperimento($id);
//             $_SESSION = array();
//             session_destroy();
             header("location: " . $GLOBALS['raiz_sitio'] . "/SelectorTareasVista.php");
             exit;
         }
     }
}

?>
