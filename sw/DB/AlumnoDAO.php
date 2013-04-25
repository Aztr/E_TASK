<?php
include_once 'ConexionGeneral.php';
include_once '/sw/domain/Alumno.php';
include_once '/sw/domain/Usuario.php';
include_once 'UsuarioDAO.php';

class AlumnoDAO extends ConexionGeneral {
    public function seleccionarAlumnoPorMatricula($alumnoMatricula) {
        $usuarioDAO = new UsuarioDAO();
        $conexion = $this->abrirConexion();
        $usuario = $usuarioDAO->seleccionarUsuarioPorMatricula($alumnoMatricula);
        $sql = "SELECT * FROM alumno WHERE usuarioId =".$usuario->getIdUsuario();
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $alumno=null;
        while ($fila = mysql_fetch_array($resultado)) {
           
            $alumno = new Alumno($usuario->getIdUsuario(),$usuario->getContrasena(), $usuario->getNombre(),$usuario->getApellidoP(),$usuario->getApellidoM(),$usuario->getMatricula(),$usuario->getTipoUsuario(), $fila["Grupo"],$fila["idAlumno"]);
            return $alumno;
        }
        $this->cerrarConexion($conexion);
        return $alumno;
    }
    public function insertarDatosAlumno($usuarioId, $grupo) {

        $registroExitoso = false;

        $conexionDB = $this->abrirConexion();
        
        $query = "INSERT INTO alumno (Grupo,usuarioId) VALUES ('" . $grupo."','".$usuarioId."' )";
        if ($this->ejecutarConsulta($query, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }


}

?>
