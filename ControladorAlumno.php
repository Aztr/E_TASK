<?php
include_once 'sw/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorAlumno{
    function agregarAlumnoC() {
        if (isset($_GET["btn_registrar"]) && $_GET["btn_registrar"] == "Registrar") {
            $nombre = $_GET["nombre"];
            $apellidoP = $_GET["apellidoP"];
            $apellidoM = $_GET["apellidoM"];
            $matricula = $_GET["matricula"];
            $contrasena = $_GET["contrasena"];
            $servicioAlumno = new ServicioAlumno();
            if($servicioAlumno->agregarAlumno($matricula, $nombre, $contrasena, $apellidoP, $apellidoM))
            {
                $msj="TRUE";
            }
            else{
                $msj="FALSE";
            }
            return $msj;
        }
    }
}

$agregarAlumno = new ControladorAlumno();
echo $agregarAlumno->agregarAlumnoC();
?>
