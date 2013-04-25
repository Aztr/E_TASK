<?php
include_once 'ServicioUsuario.php';
include_once 'DB/AlumnoDAO.php';
include_once 'DB/UsuarioDAO.php';

class ServicioAlumno {
    public function agregarAlumno($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM) {
        $servicioUsuario = new ServicioUsuario();
        $agregado = $servicioUsuario->agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, "2");
        if($agregado){
            $usuario = $servicioUsuario->buscarUsuarioPorMatricula($matricula);
            $alumnoDAO = new AlumnoDAO();           
            $alumnoDAO->insertarDatosAlumno($usuario->getIdUsuario());
            return true;
        }
        else{
            return false;
        }
    }

    public function buscarAlumnoPorMatricula($alumnoMatricula) {
        $alumnoDAO = new AlumnoDAO();
        $resultado = $alumnoDAO->seleccionarAlumnoPorMatricula($alumnoMatricula);	
	   return $resultado;
    }
}

?>