

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Alumno extends Usuario {
    private $idAlumno;
    
    public function __construct($idUsuario, $contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario,$idAlumno) {
        parent::__construct($idUsuario, $contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario);
        $this->idAlumno = $idAlumno;
    }

    public function getIdAlumno() {
        return $this->idAlumno;
    }

    public function setIdAlumno($idAlumno) {
        $this->idAlumno = $idAlumno;
    }

}
?>