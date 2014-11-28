<?php

session_start();
include_once "conexion.php";
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    mysql_select_db(DB_NAME,$con);
	
if (!$con) {
    die('No me pude conectar: ' . mysql_error());
}
mysql_query ("SET NAMES 'utf8'");
if (!mysql_select_db(DB_NAME)){
    die("No pude seleccionar la base de datos ".DB_NAME);
}

?>
<html>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
	<link rel="stylesheet" href="estilos/style_programacion.css" type="text/css" />
	<script src="scripts/script_programacion.js" type="text/javascript"></script>
	<title>Programación Quirúrgica</title> 
	<link rel="shortcut icon" href="img/miniISSSTE.jpg" type="image/x-icon"/> 
	
	<body>	
			<div>
				<br/>
				<div id="header">
		
					<img src="img/logoISSSTE.jpg" id="iconI">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;
					PROGRAMACION QUIRURGICA
					&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
					<img src="img/gobMexico.jpg" id="iconG">
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			
			TURNO: <select id = "sel_turno" name="sel_turno" onchange="activarCalendario(this);" >
						<option value="0">Selecciona...</option>
						<option value="M">MATUTINO</option>
						<option value="V">VESPERTINO</option>
					</select>
			<br/>
			<br/>
			<iframe id="internWindow" src="schedule.php?idTurno=0" scrolling="auto" src="" frameborder="0" height="400" width="100%"></iframe>	
		<!--	<div id="div_back">
				<img id="btn_back" src="img/back.png"   onclick="cargarPagina('menu.php');">-->
				<a href="menu.php">---Regresar---</a>
			<!--</div>-->
	</body>
</html>