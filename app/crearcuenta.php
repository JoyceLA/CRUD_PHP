<?php 
require_once "Usuario.php";
session_start(); 
require_once "functions.php";


	$usuario = $_SESSION['user_id'];
	$pass = $_SESSION['pass'];

	/*$user0 = new Usuario("Maria23","452232Ga");
	$user1= new Usuario("Maria23333","6371222qwss");
	$user2 = new Usuario("Maria2782313","62hwsqwss");
	$user3= new Usuario("Juana62132","6323");
	
	$user = array($user0,$user1, $user2, $user3);*/
	if(isset($_SESSION['usuario'])){
       $user = $_SESSION['usuario'];
      
    }

    
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			<link rel="stylesheet" href="style/style.css" type="text/css" />
			<title>CREAR CUENTA</title> 
			<script language="JavaScript">
				function mostrar(){ 
					//document.write(x);
				    //return;
				    alert("Nuevo"); 
			    }
			</script> 
		</head>
		<body>
			
		<center>
			<form action="" method="post" class="login"> 
				<div><label>Cuenta:</label><input name="user" type="text" value=""></div>
				<div><label>Contraseña:</label><input name="password" type="password" value=""></div>
				<div><label>Confirmar Contraseña:</label><input name="confpassword" type="password" value=""></div>
				<div>
					<input name="crear" type="submit" value="Crear";>
				</div> 
				
			</form> 
			
        </center>
		</body>
	</html>

	<?php

    if(isset($_POST['crear'])) {

    	if(($_POST['password'] == $_POST['confpassword']) and ($_POST['user'] != "")){
    		$userNow = new Usuario($usuario,$pass);
	       
	        $userNew = new Usuario($_POST['user'],$_POST['password']);
	        
	        $funcion = new Funciones();
	     	$_SESSION['usuario'] = $funcion->createUser($user,$userNew);
	       echo "<div align='center'>".$funcion->getMessageCreate()."</div>";
	       header("location:index.php"); 
	      
	    }
	    else{
	    	echo "<div align='center'>DATOS INVALIDOS</div>";
	    }
	           
    }  

?>

