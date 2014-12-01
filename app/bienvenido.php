<?php 
require_once "Usuario.php";
session_start(); 

require_once "functions.php";



	$usuario = $_SESSION['user_id'];
	$pass = $_SESSION['pass'];
 
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
			<title>Bienvenido</title> 
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
				<div><label>Cuenta:</label><input name="user" type="text" value="<?php echo  $usuario ?>"></div>
				<div><label>Contraseña:</label><input name="password" type="password" value="<?php echo $pass ?>"></div>
				<div><label>Confirmar Contraseña:</label><input name="confpassword" type="password" value="<?php echo $pass ?>"></div>
				<div>
					<input name="modificar" type="submit" value="Modificar">
					<input name="eliminar" type="submit" value="Eliminar";>
				</div> 
				
			</form> 
			
        </center>
		</body>
	</html>
<?php

    if(isset($_POST['modificar'])) {

    	if($_POST['password'] == $_POST['confpassword']){
    		$userNow = new Usuario($usuario,$pass);
	       
	        $userNew = new Usuario($_POST['user'],$_POST['password']);
	        
	        
	        $funcion = new Funciones();
	        $_SESSION['usuario'] = $funcion->updateProfile( $user,$userNow,$userNew); 
	          
	       echo "<div align='center'>".$funcion->getMessageUpdate()."</div>";
	      
	    }
	           
    }  


   if(isset($_POST['eliminar'])) {

    	if($_POST['password'] == $_POST['confpassword']){
	        $userNow = new Usuario($usuario,$pass);
	        $funcion = new Funciones();
	        $_SESSION['usuario'] = $funcion->deleteUser($user,$userNow);
	       
	        echo "<div align='center'>".$funcion->getMessageDelete()."</div>"; 
	        header("location:index.php"); 
	    }
	           
    }  



?>

