<?php

session_start();
include_once "conexion.php";
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    mysql_select_db(DB_NAME,$con);
	
if (!$con) {
    die('No me pude conectar: ' . mysql_error());
}
mysql_query ("SET NAMES 'utf8'");
if (!mysql_select_db(DB_NAME))
    die("No pude seleccionar la base de datos ".DB_NAME);

	

$rfc="";
$ocupacion="";
$nombre="";
$appaterno="";
$apmaterno="";
$pass="";
	if (isset($_SESSION['user_id'])){
		if(isset($_SESSION['pass'])){
			$username=$_SESSION["user_id"]; 
			$pass=$_SESSION["pass"];
			$result = mysql_query("SELECT CONCAT_WS(' ',m.titulo,m.nombres,m.ap_paterno,m.ap_materno), c.clave
						FROM cuentas c JOIN medicos m ON (c.cuenta = m.cedula)  WHERE cuenta ='$username' AND clave='$pass' ");
		
			if ($result){
				$registro = mysql_fetch_row($result);			
				$id = ($registro[0]);
				$pass = ($registro[1]);
				
			}		
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

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
	<link rel="stylesheet" href="estilos/stylebackground.css" type="text/css" />
	<script src="scripts/script_menu.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="img/miniISSSTE.jpg" type="image/x-icon"/> 
	
	<body >	<!--DESHABILITANDO EL BOTON IZQUIERDO PARA LAS OPCIONES   oncontextmenu="return false" onkeydown="return false"-->
		<diV id="contenedorMain">	
			<div id="logos">
					&nbsp;&nbsp;
					<img src="img/logoISSSTE.PNG" id="iconI">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<img src="img/gobMexico.jpg" id="iconG">
					&nbsp;&nbsp;
				</div>
			<div id="header">
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;<img id="tareas" title="" src="img/tareas.PNG" onclick="mostrarTareas();">

				<!--<div id="logos">
		
					<img src="img/logoISSSTE.PNG" id="iconI">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<img src="img/gobMexico.jpg" id="iconG">
				</div>-->
				<div id="salida">
					<a href="logout.php" id="cerrar">Cerrar sesión</a>
				</div>
				<label id="welcome">BIENVENIDO</label><br/><br/>

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $id; ?> </label>
			</div>
		

			
		<div id="contenedor">
			<div class="buttons">
				<?php
					if($username == "admin"){
						echo '<input name="seeWinRegistro" class="boton" type="button" value="REGISTRAR CUENTA" onClick="seeWinRegistro(\'form_registro\')" target="_self" id="seeWinRegistro"/>
							  <input name="seeWinDesbloquear" class="boton" type="button" value="DESBLOQUEAR CUENTA" onClick="seeWinDesbloquear(\'form_desbloquea\')" target="_self" id="seeWinDesbloquear"/>
							  <input name="seeWinHorarios" class="boton" type="button" value="ADMINISTRAR HORARIOS MEDICOS" onClick="seeWinAdminHorarios(\'form_adminhorarios\');" target="_self" id="seeWinHorarios"/>
							  <input name="seeWinSala" class="boton" type="button" value="PROGRAMAR SALAS" onClick="cargarPagina(\'programarsala.php\');" target="_self" id="seeWinSala"/>
							';
					}
					elseif ($username == "cirboss") {
						echo '
							  <input name="seeWinAdmiAgenda" class="boton" type="button" value="ADMINISTRAR AGENDA" onClick="cargarPagina(\'administraquirofano.php\');" target="_self" id="seeWinAdmiAgenda"/>

							 ';
					}
					else{
						echo '
						    <input name="seeWinAgendar" class="boton" type="button" value="AGENDAR CIRUGÍA" onClick="seeWinAgendar(\'form_agenda\')" target="_self" id="seeWinAgendar"/>
							<input name="seeWinVerAgenda" class="boton" type="button" value="MI AGENDA" onClick="cargarPagina(\'veragenda.php\');" target="_self" id="seeWinVerAgenda"/>
							';
					}
					echo "<br/><br/>";
				?>
				<!--</marquee>-->
				
			</div>
			<br/>
			<center>
				<div class="formulario">
					<iframe id="form_agenda" scrolling="auto" src="agendarcirugia.php" frameborder="0" height="700" width="800"></iframe>	
					<iframe id="form_registro" scrolling="auto" src="registrar.php" frameborder="0" height="700" width="800"></iframe>
					<iframe id="form_desbloquea" scrolling="auto" src="desbloquearcuenta.php" frameborder="0" height="700" width="800"></iframe>
					<iframe id="form_adminhorarios" scrolling="auto" src="administrahorario.php" frameborder="0" height="700" width="800"></iframe>
					<!--<iframe id="new_schedule" scrolling="auto" src="programarsala.php" frameborder="0" height="700" width="800"></iframe>-->
			    </div>	
			</center>

		</div>

				
		
		</diV>
		<div id="pie">
			<label>www.issste.gob.mx</label>
		</div>
	</body>
</html>