<?php

require_once "Usuario.php";
session_start();
require_once "functions.php";

    if (!isset($_SESSION['usuario'])) {
        $user = array();
        $user[0] = new Usuario("Maria23", "452232Ga");

        $user[1] = new Usuario("Maria23333", "6371222qwss");

        $user[2] = new Usuario("Maria2782313", "62hwsqwss");

        $user[3] = new Usuario("Juana62132", "6323");
        $_SESSION['usuario'] = $user;
    }

    if (!isset($_SESSION['userid'])) {
        if (isset($_POST['login'])) {
            $userNow = new Usuario($_POST['user'], $_POST['password']);

            $funcion = new Funciones();
            $_SESSION['usuario'] = $funcion->searchUser($_SESSION['usuario'], $userNow);
            if ($funcion->getMessageSearch() == "CUENTA ENCONTRADA") {
                $_SESSION['user_id'] = $_POST['user'];
                $_SESSION['pass'] = $_POST['password'];
                header("location:bienvenido.php");
            } else {
                echo '<center>CUENTA O CONTRASEÑA INVALIDO</center>';
            }
        }
    } else {
        echo '<a href="logout.php">Logout</a>';
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
			<link rel="stylesheet" href="style/style.css" type="text/css" />
			<title>Inicio Sesion</title>
		</head>
		<body>
		<div align="center"><h1>INICIAR SESIÓN</h1></div>
		<center>
			<form action="" method="post" class="login">
				<div><label>Cuenta</label><input name="user" type="text" ></div>
				<div><label>Contraseña</label><input name="password" type="password"></div>
				<div><input name="login" type="submit" value="Iniciar Sesión"></div>
                Registrate ***<a href="crearcuenta.php">Crear cuenta</a>
			</form>
        </center>
		</body>
	</html>
