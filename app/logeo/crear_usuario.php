<?php 

$user="";
$pass="";
$array = array();


?> 
<html>
<head><title>Crear Usuario</title></head>
<body>
<center><strong><font size=30>Crear Usuario</font></strong></center>

<hr>
<center><table><tr><td>
Ingrese su Nombre de Usuario y Contraseña:<br>

</td></tr>
<tr><td>

<form action="empezar_sesion.php" method="post" > 
	<br>
	Nombre   <input type="text" name="nombre" size="20" maxlength="100" value="" > 
	<br>
	Password <input type="password" name="contrasena" size="20" maxlength="40" value="" >
	<br> 

	<input type="submit" value="Log In"> 
	<br> 
	<br> 
	<input type="Reset" value="Borrar todo"> 

</td></tr></table></center>
<hr>


<center><table><tr><td>
<center><a href=index.php>Regreso a Pagina de Inicio</a></center><br>
<center>Copyright 2012 Todos los derechos reservados.</center>
</td></tr></table><center>

</body></html>
