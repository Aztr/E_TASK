<?php
include_once 'ConexionGeneral.php';
include_once '/sw/domain/Usuario.php';

class UsuarioDAO extends ConexionGeneral {

    public function seleccionarUsuarioPorMatricula($usuarioMatricula) {
        $conexion=$this->abrirConexion();        
        $sql = "SELECT * FROM usuarios WHERE matricula ='" . mysql_real_escape_string($usuarioMatricula) . "'";
//        echo $sql;
        $resultado = $this->ejecutarConsulta($sql, $conexion);
        $usuario=null;
        while ($fila = mysql_fetch_array($resultado)) {
            $usuario = new Usuario($fila["usuarioId"],$fila["contrasenia"], $fila["nombre"], $fila["apellidoP"], $fila["apellidoM"], $fila["matricula"], $fila["tipoUsuario"]);
            return $usuario;
        }
        $this->cerrarConexion($conexion);        
        return $usuario;
    }

    public function insertarUsuario($contrasena, $nombre, $apellidoP, $apellidoM, $matricula, $tipoUsuario) {
        $registroExitoso = false;
        $conexionDB = $this->abrirConexion();
        $sql = "INSERT INTO USUARIOS (nombre,apellidoP,apellidoM,matricula,contrasenia,tipoUsuario) VALUES (\"" . $nombre .
                "\",\"".$apellidoP."\", \"" . $apellidoM . "\",\"" . $matricula . "\", \"" . $contrasena . "\"," . $tipoUsuario . ");";
        //echo $sql;
        if ($this->ejecutarConsulta($sql, $conexionDB)) {
            $registroExitoso = true;
        }
        $this->cerrarConexion($conexionDB);
        return $registroExitoso;
    }


    public function existeUsuario($matricula) {
        $conexion = $this->abrirConexion();
        $existeUsuario = true;
        $query = "SELECT * FROM usuarios WHERE matricula = '" . mysql_real_escape_string($matricula) . "'";
        $lresult = $this->ejecutarConsulta($query, $conexion);
        if (!$lresult) {
            $cerror = "No fue posible recuperar la información de la base de datos.<br>";
            $cerror .= "SQL: $query <br>";
            $cerror .= "Descripción: " . mysql_error($conexion);
            die($cerror);
        } else {
            if (mysql_num_rows($lresult) === 0)
                $existeUsuario = false;
        }        
        return $existeUsuario;
    }
}

?>
