<?php
if (!$_POST['user'] || !$_POST['password']){
	header("Location: controlcuenta.php");
}
include 'conexion.php';
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    mysql_select_db(DB_NAME,$con);
if (!$con) {
    die('No me pude conectar: ' . mysql_error());
}
if ( !mysql_select_db(DB_NAME,$con)) {
    die("No pude seleccionar la base de datos ".$DB_NAME);
}
 // Obtenemos usuario y clave proporcionadas por el cliente
$myusername=$_POST['user']; 
$mypassword=$_POST['password'];


$sql="SELECT * FROM Sesion WHERE password='$mypassword' and id_sesion='$myusername'";
$result=mysql_query($sql);
if (!$result) { 
	die("La consulta para de usuario fallo!" . mysql_error());
}

$numregistros=mysql_num_rows($result);

if($numregistros>0){
	session_start();
	// Registramos $myusername, $mypassword en la sesion y  redireccionamos a "usuariosBanco.php"
	$_SESSION["user"]=$myusername;
	$_SESSION["password"]=$mypassword; 
	header("Location: menu.php");	
}
 else {
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<title>Verificacion de Login Control de Cuentas</title>
	</head>
	<body>
		<h1 style="color:red;">Usuario o clave incorrectas. </h1>
		<h1 style="color:blue;">Aun no te has registrado!! </h1>
		
		<a href="index.php">Intentar nuevamente</a>
	</body>
</html>
<?php	
 }
?>
  

   