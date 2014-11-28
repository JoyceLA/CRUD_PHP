<?php 
session_start(); 
include_once "conexion.php"; 

function verificar_login($user,$password,&$result) { 
	#echo $user;
	#echo $password;
	
	#and block=0
    $sql = "SELECT * FROM cuentas WHERE cuenta = '$user' and clave = '$password' "; 
    $rec = mysql_query($sql) or die('Error de consulta'.mysql_error($con)); 
    $count = 0; 
  	
  	#echo $sql;
  	#echo $rec;
  	if ($result) {
            echo mysql_result($result,0," ccnum");
            while($row = mysql_fetch_array($rec)) 
    		{ 
        		$count++; 
        		$result = $row; 
    		} 
  
    		if($count == 1) 
    		{ 
        		return 1; 
    		} 
  
    		else 
    		{ 
        		return 0; 
    		} 
        } else {
            echo "No result! " . mysql_error();
	}
    
} 
  

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
			<title>Inicio Sesion</title> 
			<link rel="shortcut icon" href="img/miniISSSTE.jpg" type="image/x-icon"/> 
		</head>
		<body>
			<div class="encabezado">
				<img src="img/gobMexico.jpg">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="img/logoISSSTE.png">
			</div>
			<br/>
			<br/>
			<br/>
			<form action="" method="post" class="login"> 
				<div><label>Cuenta</label><input name="user" type="text" ></div> 
				<div><label>Contraseña</label><input name="password" type="password"></div> 
				<div><input name="login" type="submit" value="Iniciar Sesión"></div> 
			</form> 
		<center><a href=crear_usuario.php>Crear Nuevo Usuario</a></center><br>
		</body>
	</html>
<?php
if(!isset($_SESSION['userid'])){ 
    if(isset($_POST['login'])) { 
        if(!isset($_SESSION['block'])){
            $_SESSION['block'] = 0;
        }
        if(isset($_SESSION['block'])){
            if($_SESSION['block']< 3){
               if(verificar_login($_POST['user'],$_POST['password'],$result) == 1){ 
                    $_SESSION['user_id'] = $_POST['user']; 
                    $_SESSION['pass'] = $_POST['password']; 
                    header("location:menu.php"); 
                } 
                else{ 
                    $_SESSION['block']  += 1; 
                    echo '<div class="error">Su usuario o contraseña es incorrecto, intente nuevamente.</div>';
                }
            } 
            elseif ($_SESSION['block'] >= 3) {
                $result = mysql_query("UPDATE cuentas SET block=1 WHERE cuenta ='".$_POST['user']."'");
                echo '<div class="error">SU CUENTA HA SIDO BLOQUEADA. <br/> CONTACTE CON EL ADMINISTRADOR</div>';   
                unset($_SESSION['block']);
            }
        }
    }  
} else{ 
    echo 'Su usuario ingreso correctamente.'; 
    echo '<a href="logout.php">Logout</a>'; 
} 
?>