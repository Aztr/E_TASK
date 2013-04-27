<?php
include_once 'ServicioUsuario.php';
include_once 'DB/UsuarioDAO.php';

class ServicioAlumno {
    public function agregarAlumno($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM) {
        $servicioUsuario = new ServicioUsuario();
        $agregado = $servicioUsuario->agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, "2");
        if($agregado){
            $usuario = $servicioUsuario->buscarUsuarioPorMatricula($matricula);
            return true;
        }
        else{
            return false;
        }
    }
}

?>