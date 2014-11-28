<?php 
session_start(); 
include_once "conexion.php"; 
$user="";
$pass="";
    /*VALIDANDO QUE SI HAYA INICIADO SESION*/
    if (isset($_SESSION['user_id'])){
        if(isset($_SESSION['pass'])){
            $username=$_SESSION["user_id"]; 
            $pass=$_SESSION["pass"];     
        }
        else{
            session_destroy();  
            header('location: index.php');
        }
    }
    else{
        session_destroy();  
        header('location: index.php');
    }


?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
            <script src="scripts/scripts.js" type="text/javascript"></script>
			<title>Registrarse</title> 
			<link rel="shortcut icon" href="img/miniISSSTE.jpg" type="image/x-icon"/> 
		</head>
		<body class="form_report">
			<div class="fondo_admin">    
            <br/>
            <?php

                if($username == "admin"){ 
            			echo '
                            <div>
                                <form action="" method="post" class="login"> 
                    				<div><label>Cuenta</label><input id="new_user" name="new_user" type="text" ></div> 
                    				<div><label>Contraseña</label><input id="new_password" name="new_password" type="password"></div>
                                    <div><label>Confirma Contraseña</label><input id="conf_password" name="conf_password" type="password"></div>  
                    				<input name="login" type="button" value="Registrar" onClick="registrarCuenta();"></div>
                    			</form>
                                <div id="errorCuenta" ></div>
                            </div>
                           ';
                    
                } 
                else{ 
                    echo "  
                       
                        <div id='prohibido_img'><img src='img/candado.jpg'></div>
                        <marquee behavior=\"alternate\" direction=\"rigth\" scrollamount=\"5\" class='tagStop'>CONTACTAR AL ADMINISTRADOR PARA REGISTRAR UNA CUENTA NUEVA</marquee>"
                        ;
                } 
            ?>
          
           </div>
		</body>
	</html>
