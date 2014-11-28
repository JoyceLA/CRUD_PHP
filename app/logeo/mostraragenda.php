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
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
			<link rel="stylesheet" href="estilos/styleagenda.css" type="text/css" />
			
			<script src="scripts/scripts.js" type="text/javascript"></script>
			<title>Reporte de Servicio</title>
		</head>
		

				<div class="fondo">
					<div>
					<br/>
					<div id="header">
			
						<img src="img/logoISSSTE.jpg" id="iconI">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
				
				<div class="fondo_form_agenda">
					<center>
						<table id="tbl_cuenta"  cellpadding="4" cellspacing="7" border="1">
							<tr>
								<th>FECHA</th>
								<th>TURNO</th>
								<th>SERVICIO</th>
								<th>MEDICO</th>
								<th>CEDULA</th>
								<th>PACIENTE</th>
								<th>EDAD</td>
								<th>DIAGNOSTICO</th>
								<th>CIRUGIA</th>
								<th>QUIROFANO</th>
							</tr>
							<?php
								$result = mysql_query("SELECT a.num_agenda, a.fecha, a.id_turno, s.id_servicio, s.nombre, m.id_medico, 
									CONCAT_WS(  ' ', m.nombres, m.ap_paterno, m.ap_materno ) , a.cedula, 
									CONCAT_WS(  ' ', p.nombres, p.ap_paterno, p.ap_materno ) ,p.edad,  a.diagnostico, a.cirugia, a.id_quirofano
									FROM agenda a JOIN servicios s ON ( a.id_servicio = s.id_servicio ) 
												  JOIN medicos m ON ( m.id_medico = a.id_medico ) 
												  JOIN pacientes p ON ( p.cedula = a.cedula )");
								if ($result) {
									$n = mysql_num_rows($result);
									for ($i=0; $i<$n; $i++) {
										$registro = mysql_fetch_row($result);
										echo "<tr>";
										echo "<td  style=\"display:none;\">".$registro[0]."</td>";
										echo "<td>".$registro[1]."</td>";
										echo "<td>".$registro[2]."</td>";
										echo "<td  style=\"display:none;\">".$registro[3]."</td>";
										echo "<td>".$registro[4]."</td>";
										echo "<td  style=\"display:none;\">".$registro[5]."</td>";
										echo "<td>".$registro[6]."</td>";
										echo "<td>".$registro[7]."</td>";
										echo "<td>".$registro[8]."</td>";
										echo "<td>".$registro[9]."</td>";
										echo "<td>".$registro[10]."</td>";
										echo "<td>".$registro[11]."</td>";
										if($registro[12]==0){//Bloqueado
											echo "<td bgcolor=#DF0101 onClick=\"desbloquear(this, document.getElementById('".$registro[0]."'),'".$registro[0]."');\"></td>";
										}
										else{
											echo "<td bgcolor=#298A08 onClick=\"desbloquear(this, document.getElementById('".$registro[0]."'),'".$registro[0]."');\"></td>";
										}
										echo "</tr>";
									}
									mysql_free_result($result);
								}
								
							?>		
							
						</table>
					</center>					
				</div>
				<br/>
			
			</div>	
			<div id="acciones">
				<input type="button" class="btnStandard" id="BtnCancelar" value="Regresar" onclick="regresar();" /><br />
			</div>
		</body>
</html>