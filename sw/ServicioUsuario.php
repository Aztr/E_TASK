<?php
include_once 'DB/UsuarioDAO.php';

class ServicioUsuario {

    public function agregarUsuario($matricula, $nombre, $contrasenia, $apellidoP, $apellidoM, $tipoUsuario) {
        $usuarioDAO = new UsuarioDAO();
        $exito = false;        
        if (!$usuarioDAO->existeUsuario($matricula)) {
            $usuarioDAO->insertarUsuario($contrasenia, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario);
            return true;
        } else {
            return false;
        }
    }

    public function buscarUsuarioPorMatricula($matricula) {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->seleccionarUsuarioPorMatricula($matricula);
    }
}
?>


