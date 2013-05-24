<?php
include_once ('sw/DB/UsuarioDAO.php');
include_once 'domain/Usuario.php';

class Sesion {

    function iniciarSesion() {
        if (isset($_POST['login'])) {
//            echo "x1";
            if (isset($_POST["username"])) {
//                echo "x2";
                $matricula = $_POST["username"];                
                if (isset($_POST["password"])) {
//                    echo "x3";
                    $password = $_POST["password"];
                    $usuarioDAO = new UsuarioDAO();
                    $usuario = $usuarioDAO->seleccionarUsuarioPorMatricula($matricula);
                    if ($usuario != null) {
//                        echo "x4";
                        if ($matricula == trim($usuario->getMatricula()) && $password == trim($usuario->getContrasena())) {
                            echo "x5";
                            $_SESSION['login'] = true;
                            $_SESSION['usuarioId'] = $usuario->getIdUsuario();
                            $_SESSION['nombre'] = $usuario->getNombre();
                            $_SESSION['tipo'] = $usuario->getTipoUsuario();
                            $_SESSION['matricula'] = $usuario->getMatricula();
                            $_SESSION['nombreTecnica']="Pruebas funcionales";
                            $_SESSION['idTarea']=0;
                            $_SESSION['idBD']=0;
                            if ($usuario->getTipoUsuario() == 2) {
                                header("Location: principal.php");
                            } else {
                                header("Location: principal.php");
                            }
                        } else {
                            return "<div class='error' id='error'><b>La contraseña es incorrecta. Favor de verificarla.</b></div>";
                        }
                    } else {
                        $_SESSION['login'] = false;
                        return "<div class='error' id='error'><b>Los datos introducidos son incorrectos. Favor de verificarlos.</b></div>";
                    }
                } else {
                    return "<div class='error' id='error'>Escriba su contraseña</div>";
                }
            }
        }
//        echo "x0";
    }

    function sesionActiva() {
        session_start();
        if (isset($_SESSION['login'])) {
            $logueado = $_SESSION['login'];
            if ($logueado) {
                if ($_SESSION['tipo'] == 2) {
                    header("Location:" . $GLOBALS['raiz_sitio'] . "/principal.php");
                }
            }
        }
    }

    function filtro_login() {
        session_start();
        if (isset($_SESSION['login'])) {
            $logueado = $_SESSION['login'];
            if (!$logueado) {
                header("Location: " . $GLOBALS['raiz_sitio'] . "/index.php");
            }
        } else {
            header("Location: " . $GLOBALS['raiz_sitio'] . "/index.php");
        }
    }

}

?>
	   