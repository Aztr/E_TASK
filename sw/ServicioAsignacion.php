<?php
include_once 'DB/AsignacionDAO.php';
/**
 * Description of ServicioAsignacion
 *
 * @author Angel
 */
class ServicioAsignacion {
    //$_SESSION['usuarioId'] 
    public function obtenerAsignacion(){
        $asignacionDAO = new AsignacionDAO();        
        return $asignacionDAO->obtenerAsignacion($_SESSION['usuarioId']);       
    }
}

?>
