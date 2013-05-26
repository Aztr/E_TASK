<?php

include_once 'DB/AsignacionDAO.php';
include_once 'DB/TareaDAO.php';

/**
 * Description of ServicioAsignacion
 *
 * @author Angel
 */
class ServicioAsignacion {

    //$_SESSION['usuarioId'] 
    public function obtenerAsignacion() {
        $asignacionDAO = new AsignacionDAO();
        return $asignacionDAO->obtenerAsignacion($_SESSION['usuarioId']);
    }
    public function numeroTareas($idTecnica){
         $tareaDAO=new TareaDAO();                  
         return (count($tareaDAO->seleccionarTareasPorIdTecnica($idTecnica)));
     }
}

?>
