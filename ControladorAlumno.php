<?php
include_once 'sw/ServicioAlumno.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControladorAlumno{
    function agregarAlumnoC() {
        if (isset($_GET["btn_registrar"]) && $_GET["btn_registrar"] == "Registrarse") {
//            echo "x1";
            $nombre = $_GET["username"];
            $apellidoP = $_GET["usernamelast"];
//            $apellidoM = $_GET["usernamelast"];
            $matricula = $_GET["emailsignup"];
            $contrasena = $_GET["passwordsignup"];
            $servicioAlumno = new ServicioAlumno();
            if($servicioAlumno->agregarAlumno($matricula, $nombre, $contrasena, $apellidoP, ""))
            {
                $msj="TRUE";
                die();
            }
            else{
                $msj="FALSE";
                die();
            }
            return $msj;
        }
    }
}
$agregarAlumno = new ControladorAlumno();
echo $agregarAlumno->agregarAlumnoC();
?>
