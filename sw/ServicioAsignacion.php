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

    public function numeroTareas($idTecnica) {
        $tareaDAO = new TareaDAO();
        return (count($tareaDAO->seleccionarTareasPorIdTecnica($idTecnica)));
    }

    public function registrarInicioTarea($idDB) {
        $asignacionDAO = new AsignacionDAO();
        $mysqldate = date('Y-m-d H:i:s');
//        return $asignacionDAO->inicioDuracionTarea($_SESSION['usuarioId'], $_SESSION['idDB'], $mysqldate, $mysqldate);
        return $asignacionDAO->inicioDuracionTarea($_SESSION['usuarioId'], $idDB, $mysqldate, $mysqldate);
    }

}

?>
