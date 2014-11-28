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
		<table id="calendario" border="1">
				<tr id="cal_header">
					<td>DIA</td>
					<td>SALA NO. 1</td>
					<td>SALA NO. 2</td>
					<td>SALA NO. 3</td>
					<td>SALA NO. 4</td>
				</tr>
				<tr>
					<td class="day">LUNES</td>
					
					<td>
						<label id="serviceplusL1"></label>
						<select id="sel_lunes1" name="sel_lunes1"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
						<img id="btnL1" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_lunes1'),document.getElementById('btn_L1'));" />
						<img id="btn_L1"class="botons" src="img/plus.png" onclick="agregarServicio(1,'LUNES',document.getElementById('sel_lunes1'),document.getElementById('serviceplusL1'));" />
						
						
					</td>

					<td>
						<label id="serviceplusL2"></label>
						<select id = "sel_lunes2" name="sel_lunes2"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnL2" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_lunes2'),document.getElementById('btn_L2'));" />
							<img id="btn_L2"class="botons" src="img/plus.png" onclick="agregarServicio(2,'LUNES',document.getElementById('sel_lunes2'),document.getElementById('serviceplusL2'));" />
					</td>
					<td>
						<label id="serviceplusL3"></label>
						<select id = "sel_lunes3" name="sel_lunes3"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnL3" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_lunes3'),document.getElementById('btn_L3'));" />
							<img id="btn_L3"class="botons" src="img/plus.png" onclick="agregarServicio(3,'LUNES',document.getElementById('sel_lunes3'),document.getElementById('serviceplusL3'));" />
					</td>
					<td>
						<label id="serviceplusL4"></label>
						<select id = "sel_lunes4" name="sel_lunes4"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnL4" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_lunes4'),document.getElementById('btn_L4'));" />
							<img id="btn_L4"class="botons" src="img/plus.png" onclick="agregarServicio(4,'LUNES',document.getElementById('sel_lunes4'),document.getElementById('serviceplusL4'));" />
					</td>

				</tr>
				<tr>
					<td class="day">MARTES</td>
					
					<td>
						<label id="serviceplusM1"></label>
						<select id = "sel_Mart1" name="sel_Mart1"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnM1" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mart1'),document.getElementById('btn_M1'));" />
							<img id="btn_M1"class="botons" src="img/plus.png" onclick="agregarServicio(1,'MARTES',document.getElementById('sel_Mart1'),document.getElementById('serviceplusM1'));" />
					</td>
					<td>
						<label id="serviceplusM2"></label>
						<select id = "sel_Mart2" name="sel_Mart2"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnM2" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mart2'),document.getElementById('btn_M2'));" />
							<img id="btn_M2"class="botons" src="img/plus.png" onclick="agregarServicio(2,'MARTES',document.getElementById('sel_Mart2'),document.getElementById('serviceplusM2'));" />
					</td>
					<td>
						<label id="serviceplusM3"></label>
						<select id = "sel_Mart3" name="sel_Mart3"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnM3" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mart3'),document.getElementById('btn_M3'));" />
							<img id="btn_M3"class="botons" src="img/plus.png" onclick="agregarServicio(3,'MARTES',document.getElementById('sel_Mart3'),document.getElementById('serviceplusM3'));" />
					</td>
					<td>
						<label id="serviceplusM4"></label>
						<select id = "sel_Mart4" name="sel_Mart4"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnM4" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mart4'),document.getElementById('btn_M4'));" />
							<img id="btn_M4"class="botons" src="img/plus.png" onclick="agregarServicio(4,'MARTES',document.getElementById('sel_Mart4'),document.getElementById('serviceplusM4'));" />
					</td>

				</tr>
				<tr>
					<td class="day">MIERCOLES</td>
				
					<td>
						<label id="serviceplusMi1"></label>
						<select id = "sel_Mier1" name="sel_Mier1"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnMi1" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mier1'),document.getElementById('btn_Mi1'));" />
							<img id="btn_Mi1"class="botons" src="img/plus.png" onclick="agregarServicio(1,'MIERCOLES',document.getElementById('sel_Mier1'),document.getElementById('serviceplusMi1'));" />
					</td>
					<td>
						<label id="serviceplusMi2"></label>
						<select id = "sel_Mier2" name="sel_Mier2"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnMi2" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mier2'),document.getElementById('btn_Mi2'));" />
							<img id="btn_Mi2"class="botons" src="img/plus.png" onclick="agregarServicio(2,'MIERCOLES',document.getElementById('sel_Mier2'),document.getElementById('serviceplusMi2'));" />
					</td>
					<td>
						<label id="serviceplusMi3"></label>
						<select id = "sel_Mier3" name="sel_Mier3"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnMi3" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mier3'),document.getElementById('btn_Mi3'));" />
							<img id="btn_Mi3"class="botons" src="img/plus.png" onclick="agregarServicio(3,'MIERCOLES',document.getElementById('sel_Mier3'),document.getElementById('serviceplusMi3'));" />
					</td>
					<td>
						<label id="serviceplusMi4"></label>
						<select id = "sel_Mier4" name="sel_Mier4"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnMi4" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Mier4'),document.getElementById('btn_Mi4'));" />
							<img id="btn_Mi4"class="botons" src="img/plus.png" onclick="agregarServicio(4,'MIERCOLES',document.getElementById('sel_Mier4'),document.getElementById('serviceplusMi4'));" />
					</td>

				</tr>
				<tr>
					
					<td class="day">JUEVES</td>
					
					<td>
						<label id="serviceplusJ1"></label>
						<select id = "sel_Juev1" name="sel_Juev1"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnJ1" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Juev1'),document.getElementById('btn_J1'));" />
							<img id="btn_J1"class="botons" src="img/plus.png" onclick="agregarServicio(1,'JUEVES',document.getElementById('sel_Juev1'),document.getElementById('serviceplusJ1'));" />
					</td>
					<td>
						<label id="serviceplusJ2"></label>
						<select id = "sel_Juev2" name="sel_Juev2"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnJ2" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Juev2'),document.getElementById('btn_J2'));" />
							<img id="btn_J2"class="botons" src="img/plus.png" onclick="agregarServicio(2,'JUEVES',document.getElementById('sel_Juev2'),document.getElementById('serviceplusJ2'));" />
					</td>
					<td>
						<label id="serviceplusJ3"></label>
						<select id = "sel_Juev3" name="sel_Juev3"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnJ3" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Juev3'),document.getElementById('btn_J3'));" />
							<img id="btn_J3"class="botons" src="img/plus.png" onclick="agregarServicio(3,'JUEVES',document.getElementById('sel_Juev3'),document.getElementById('serviceplusJ3'));" />
					</td>
					<td>
						<label id="serviceplusJ4"></label>
						<select id = "sel_Juev4" name="sel_Juev4"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnJ4" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Juev4'),document.getElementById('btn_J4'));" />
							<img id="btn_J4"class="botons" src="img/plus.png" onclick="agregarServicio(4,'JUEVES',document.getElementById('sel_Juev4'),document.getElementById('serviceplusJ4'));" />
					</td>

				</tr>
				<tr>
					<td class="day">VIERNES</td>
					
					<td>
						<label id="serviceplusV1"></label>
						<select id = "sel_Vier1" name="sel_Vier1"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnV1" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Vier1'),document.getElementById('btn_V1'));" />
							<img id="btn_V1"class="botons" src="img/plus.png" onclick="agregarServicio(1,'VIERNES',document.getElementById('sel_Vier1'),document.getElementById('serviceplusV1'));" />
					</td>
					<td>
						<label id="serviceplusV2"></label>
						<select id = "sel_Vier2" name="sel_Vier2"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnV2" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Vier2'),document.getElementById('btn_V2'));" />
							<img id="btn_V2"class="botons" src="img/plus.png" onclick="agregarServicio(2,'VIERNES',document.getElementById('sel_Vier2'),document.getElementById('serviceplusV2'));" />
					</td>
					<td>
						<label id="serviceplusV3"></label>
						<select id = "sel_Vier3" name="sel_Vier3"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnV3" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Vier3'),document.getElementById('btn_V3'));" />
							<img id="btn_V3"class="botons" src="img/plus.png" onclick="agregarServicio(3,'VIERNES',document.getElementById('sel_Vier3'),document.getElementById('serviceplusV3'));" />
					</td>
					<td>
						<label id="serviceplusV4"></label>
						<select id = "sel_Vier4" name="sel_Vier4"  >
								<option value="0">Selecciona...</option>
								<?php
	 
									$result = mysql_query("SELECT * FROM servicios ORDER BY nombre ASC");
									if ($result) {
										$n = mysql_num_rows($result);
										for ($i=0; $i<$n; $i++) {
											$registro = mysql_fetch_row($result);
											echo "<option value=\"".$registro[0]."\"";
											
											echo ">".$registro[2]."</option>\n";
										}
										mysql_free_result($result);
									}
									
								?>								
							</select>
							<img id="btnV4" class="botons" src="img/paloma.png"  onclick="finalizar(this,document.getElementById('sel_Vier4'),document.getElementById('btn_V4'));" />
							<img id="btn_V4"class="botons" src="img/plus.png" onclick="agregarServicio(4,'VIERNES',document.getElementById('sel_Vier4'),document.getElementById('serviceplusV4'));" />
					</td>
				</tr>

		</table>
		
	</body>
</html>