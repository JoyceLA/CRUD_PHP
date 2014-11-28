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
else{
	//Se crea la variable sesion para dejar vacia la tabla que contiene los horarios de los servicios por sala, dia y turno
	/*if(!isset($_SESSION['emptyTable'])){
		$_SESSION['emptyTable'] = "Existo";
		$sql = "TRUNCATE TABLE salas";
		$result = mysql_query($sql);
		if ($result) {
			echo "EXITO";
		}
		else{
			echo "ERROR AL VACIAR LA TABLA ";
		}
	}*/
}
	

?>
<html>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
	<link rel="stylesheet" href="estilos/style_programacion.css" type="text/css" />
	<script src="scripts/script_programacion.js" type="text/javascript"></script>
	 
	<link rel="shortcut icon" href="img/miniISSSTE.jpg" type="image/x-icon"/> 
	
	<body>	
		<input type="text" id="id_turn" value="<?php echo $_GET['idTurno'];?>">
		<table id="calendario_anestesia" border="1">
				<tr id="cal_header">
					<td>SALA No.</td>
					<td>ANESTECIÓLOGO</td>
				</tr>
				<tr>
					<td class="day">1</td>
					
					<td>
						<label id="lb_anest1"></label>
						<select id="sel_anest1" name="sel_anest1"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM anestesiologos ORDER BY nombres ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[1]." ".$registro[2]." ".$registro[3]." ".$registro[4]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							
						<img id="btnL1" class="botons" src="img/paloma.png"  onclick="finalizarAnest(1,this,document.getElementById('sel_anest1'),document.getElementById('lb_anest1'));" />						
						
					</td>

					
				</tr>
				<tr>
					<td class="day">2</td>
					
					<td>
						<label id="lb_anest2"></label>
						<select id="sel_anest2" name="sel_anest2"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM anestesiologos ORDER BY nombres ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[1]." ".$registro[2]." ".$registro[3]." ".$registro[4]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
						<img id="btnL2" class="botons" src="img/paloma.png"  onclick="finalizarAnest(2,this,document.getElementById('sel_anest2'),document.getElementById('lb_anest2'));" />						
						
					</td>

					
				</tr>
				<tr>
					<td class="day">3</td>
					
					<td>
						<label id="lb_anest3"></label>
						<select id="sel_anest3" name="sel_anest3">
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM anestesiologos ORDER BY nombres ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[1]." ".$registro[2]." ".$registro[3]." ".$registro[4]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
						<img id="btnL3" class="botons" src="img/paloma.png"  onclick="finalizarAnest(3,this,document.getElementById('sel_anest3'),document.getElementById('lb_anest3'));" />						
						
					</td>

					
				</tr>
				<tr>
					<td class="day">4</td>
					
					<td>
						<label id="lb_anest4"></label>
						<select id="sel_anest4" name="sel_anest4"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM anestesiologos ORDER BY nombres ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[1]." ".$registro[2]." ".$registro[3]." ".$registro[4]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
						<img id="btnL4" class="botons" src="img/paloma.png"  onclick="finalizarAnest(4,this,document.getElementById('sel_anest4'),document.getElementById('lb_anest4'));" />						
						
					</td>

					
				</tr>


		</table>
		
	</body>
</html>