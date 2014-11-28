<?php

		echo "<html>";
		echo "<head><title>Pagina de Sesion</title></head>";
		echo "<body>";
		echo "<center><strong><font size=50>Pagina de Sesion</font></strong></center>";
		echo '<center><IMG SRC="banner.jpg"></center>';
		echo "<hr>";

		include "conecta.php";
		
		$nombre=$_POST["nombre"];
		$password=$_POST["contrasena"];
		
		$sql = "SELECT * FROM alumnos where nombre='$nombre'"; //Se coloca la sentencia SQL en una variable
		//echo $sql."<br>";
		$resultado = mysql_query($sql);
		//echo $resultado;
		$registros = mysql_fetch_array($resultado);
			
		if( $registros["password"]==$password ){
			echo "Bienvenido ".$registros["nombre"];
			echo "<br>Se ha creado la sesion con exito.<br>";
			session_start();
			echo "Identificador de Sesion".SID;
			$_SESSION["usuario"]=$registros["nombre"];
			$_SESSION["programa"]=$registros["programa"];
			$_SESSION["semestre"]=$registros["semestre"];
	
			$_SESSION["utlima_actividad"]=strtotime("now");
			//regresa el tiempo transcurrido en segundo de fecha fija hasta "ahora"
			$_SESSION["tiempo_sesion"]=30;
		}else{
			echo "Nombre incorrecto o la Passoword incorrecta!!";
		}

		echo "<hr><br><center><table><tr><td>";
		echo "<a href=paginaInicio.html>Regreso a Pagina de Inicio</a><br>";
		echo "<center>Copyright 2012 Todos los derechos reservados.</center>";
		echo "</td></tr></table><center>";
		echo "</body></html>";
?>