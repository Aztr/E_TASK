<?php
include_once 'DB/DefectosDAO.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServicioDefectos
 *
 * @author Angel
 */
class ServicioDefectos {
    //put your code here
    public function obtenerTiposDefectos(){
        $defDAO = new DefectosDAO();
        return $defDAO->obtenerTipoDefecto();
    }
    public function obtenerTiposDetectDefectos(){
        $defDAO = new DefectosDAO();
        return $defDAO->obtenerTipoDetecDefecto();
    }
    public function insertarDefecto ($describicion, $id_asignacion, $tipo_defecto, $tipo_deteccion){
        $defDAO = new DefectosDAO();
        return $defDAO->insertarDefectoEncontrado($describicion, $id_asignacion, $tipo_defecto, $tipo_deteccion);
    }
}

if(isset($_POST['Reg_def'])){
    include_once '../config.inc.php';
    $ser = new ServicioDefectos();    
    $ser->insertarDefecto($_POST['descripcion'], $_POST['id_asig'], $_POST['tipo_deteccion_defectos'],$_POST['id_tipo_detec']);
    echo $_POST['descripcion']."--->". $_POST['id_asig']."--->".$_POST['tipo_deteccion_defectos']."--->".$_POST['id_tipo_detec'];
}
?>
