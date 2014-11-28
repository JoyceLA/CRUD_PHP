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
			<script src="scripts/script_programacion.js" type="text/javascript"></script>
			<title>Administrar Horarios de Médicos</title>
		</head>
		<body class="form_report">

			<div class="fondo_admin">	
				<br/>

				<div id="contBusqueda">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>		
						<input id="search_doctor" type="text" value="Buscar..." onfocus="quitarTexto(this);" onblur="mostrarTexto(this);">
						<img class="botons" src="img/lupa.png" title="Click para buscar médico" onClick="searchdoctor();" />
					</span>
				</div>
				<br/>
				<select id="list_medicos"  onClick="llenarInfoMedico(this);">
					<option value="0">Cargando...</option>
				</select>
				<div id="doctor_notfound" class="error"></div>
				<br/>
				<br/>

				<div class="fondo_form_medic">
					<table id="tbl_medico">
						<tr>
							<th style="display:none">ID MEDICO</th>
							<th>CEDULA</th>
							<th>MEDICO</th>
							<th>TELEFONO</th>
							<th>HORA ENTRADA</th>
							<th>HORA SALIDA</th>
						</tr>
						<tr>
							<td style="display:none">
								<input type="text" id="doc_id" disabled value="" size="7">
							</td>
							<td>
								<input type="text" id="doc_cedula" disabled value="" size="12">
							</td>
							<td>
								<input type="text" id="doc_name" disabled value="" size="35">
							</td>
							<td>
								<input type="text" id="doc_tel" value="" size="12">
							</td>
							<td>
								<select id="doc_hrentrada">
									<option value=000>00:00</option>
									<option value=100>01:00</option>
									<option value=200>02:00</option>
									<option value=300>03:00</option>
									<option value=400>04:00</option>
									<option value=500>05:00</option>
									<option value=600>06:00</option>
									<option value=700>07:00</option>
									<option value=800>08:00</option>
									<option value=900>09:00</option>
									<option value=1000>10:00</option>
									<option value=1100>11:00</option>
									<option value=1200>12:00</option>
									<option value=1300>13:00</option>
									<option value=1400>14:00</option>
									<option value=1500>15:00</option>
									<option value=1600>16:00</option>
									<option value=1700>17:00</option>
									<option value=1800>18:00</option>
									<option value=1900>19:00</option>
									<option value=2000>20:00</option>
									<option value=2100>21:00</option>
									<option value=2200>22:00</option>
									<option value=2300>23:00</option>
									<option value=2400>24:00</option>
								</select>
							</td>
							<td>
								<select id="doc_hrsalida">
									<option value=000>00:00</option>
									<option value=100>01:00</option>
									<option value=200>02:00</option>
									<option value=300>03:00</option>
									<option value=400>04:00</option>
									<option value=500>05:00</option>
									<option value=600>06:00</option>
									<option value=700>07:00</option>
									<option value=800>08:00</option>
									<option value=900>09:00</option>
									<option value=1000>10:00</option>
									<option value=1100>11:00</option>
									<option value=1200>12:00</option>
									<option value=1300>13:00</option>
									<option value=1400>14:00</option>
									<option value=1500>15:00</option>
									<option value=1600>16:00</option>
									<option value=1700>17:00</option>
									<option value=1800>18:00</option>
									<option value=1900>19:00</option>
									<option value=2000>20:00</option>
									<option value=2100>21:00</option>
									<option value=2200>22:00</option>
									<option value=2300>23:00</option>
									<option value=2400>24:00</option>
								</select>
							</td>
						</tr>
						
					</table>
									
				</div>
				<br/>
				<div id="acciones">
					<input type="button" class="btnStandard" id="BtnReporte" value="Guardar Cambios"  onclick="guardarInfoMedico();" />
				<!--	<input type="button" class="btnStandard" id="BtnCancelar" value="Regresar" onclick="cargarPagina('menu.php');" /><br />-->
				</div>
				<br/>
				<br/>
			</div>	

		</body>
</html>