<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		if(isset($_SESSION['pass'])){
		include_once "conexion.php";

		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			mysql_select_db(DB_NAME,$con);
			
		if (!$con) {
			die('No me pude conectar: ' . mysql_error());
		}
		mysql_query ("SET NAMES 'utf8'");
		if (!mysql_select_db(DB_NAME))
			die("No pude seleccionar la base de datos ".DB_NAME);

		$id_servicio=0;
		$id_turno = "";
		$descp = "";
		$cedula = $_SESSION['user_id'];
		$clave = 0;
		$medico = "";

		$result = mysql_query("SELECT * FROM medicos WHERE cedula='".$cedula."'");
			
			if($result) {
				$n = mysql_num_rows($result);
				for ($i=0; $i<$n; $i++) {
					$registro = mysql_fetch_row($result);
					$clave = $registro[0];
					$medico = $registro[2]." ".$registro[5]." ".$registro[3]." ".$registro[4];
				}
				
			}


	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			
			<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
			<script src="scripts/script_agenda.js" type="text/javascript"></script>
			<title>Agendar Cirugia</title>
		</head>
		<body class="form_report" >
			<div class="fondo">
				
				<label id="lb_fecha">
					<?php 
						$d = date("N");
						$dia = "";
						switch ($d) {
							case 1:
								$dia = "Lunes";
								break;
							case 2:
								$dia = "Martes";
								break;
							case 3:
								$dia = "Miércoles";
								break;
							case 4:
								$dia = "Jueves";
								break;
							case 5:
								$dia = "Viernes";
								break;
							case 6:
								$dia = "Sábado";
								break;
							case 7:
								$dia = "Domingo";
								break;
						}

						$m = date("m");
						$mes="";
						switch ($m) {
							case 1:
								$mes="Enero";
								break;
							case 2:
								$mes="Febrero";
								break;
							case 3:
								$mes="Marzo";
								break;
							case 4:
								$mes="Abril";
								break;
							case 5:
								$mes="Mayo";
								break;
							case 6:
								$mes="Junio";
								break;
							case 7:
								$mes="Julio";
								break;
							case 8:
								$mes="Agosto";
								break;
							case 9:
								$mes="Septiembre";
								break;
							case 10:
								$mes="Octubre";
								break;
							case 11:
								$mes="Noviembre";
								break;
							case 12:
								$mes="Diciembre";
								break;
						}
						echo $dia.", ". date("d")." de ".$mes." de ".date("Y") ;
					?>
				</label>
				<input id="fecha" type="text" value="<?php echo date('y/m/d')?>" hidden />
				
				
				
				<br/><br/><br/>		
				<div class="fondo_form_agenda">
					<table id="tbl_dir">
					   <tr>
							<td>
								<form name="medico">
									<input type="text" id="id_medico" value="<?php echo $clave ?>" style="display: none;" >
									Médico:<input type="text" name="inMedico" id="inMedico" value="<?php echo $medico ?>" size="50" disabled/>
										
								</form>
								<p id="mjs_error" class="error"></p>
							</td>
							
						</tr>
						<tr>
							<td>
								Turno:<span id="obligatorio" class="requiredText">*</span><select id = "sel_turno" name="sel_turno" onBlur="redireccionaServicios(this);">
											<option value="0">Selecciona...</option>
											<option value="M">MATUTINO</option>
											<option value="V">VESPERTINO</option>
											<option value="N">NOCTURNO</option>
											<option value="F">FIN DE SEMANA</option>
										</select>
							</td>
							
						</tr>
						<tr>
							<td>
								Servicio:<span id="obligatorio" class="requiredText">*</span><select id="sel_servicio" name="sel_servicio" onBlur="searchDateService(this);" >
											<option value="0">Selecciona...</option>
															
										</select>
							</td>
						</tr>
						<tr>
							<td>
								Cedula:<span id="obligatorio" class="requiredText">*</span>
										<input type="text" name="inCedula" id="inCedula" value="" onBlur="obtenerDatosPaciente();"/><br/>
								Paciente:<input type="text" name="inPaciente" id="inPaciente" value="" disabled size="50"/>
								Edad:<span id="obligatorio" class="requiredText">*</span>
										<input type="text" name="inEdad" id="inEdad" value="" size="3"/>
							</td>
							
						</tr>
						
						<tr>
							<td>
								<span id="obligatorio" class="requiredText">
									<label for="txta_diagnostico">Diagnóstico</label>*</span><br/>
									<textarea id="txta_diagnostico" class="diagnostico" rows="4" cols="80" ><?php echo $descp?></textarea>
								
							</td>
						</tr>
						<tr>
							<td>
								Cirugía:<span id="obligatorio" class="requiredText">*</span>
										<input type="text" name="inCirugia" id="inCirugia" value="" size="50"/>
								
							</td>
						</tr>
						<tr>
							<td>
								Fechas disponibles:<span id="obligatorio" class="requiredText">*</span>
										<select id="sel_fechas" name="sel_fechas"  >
											<option value="0">Selecciona...</option>		
										</select>
							</td>
						</tr>

						<!--<tr>
							<td>
								Fecha de cirugia: <input onclick="ds_sh(this);" id="date" name="date" readonly="readonly" style="cursor: text" /><br />
								<?php
								/*	
								   $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
									$fecha = $dias[date('N', strtotime('2014-09-02'))]; 
								  echo "<label>Proximo ".$fecha.": </label>";
								?>
								<label>
									<?php 
										$day = date('l', strtotime('2014-10-15'));
										$fecha = date('Y-m-j');
										$date=date("Y-m-d", strtotime ("next ".$day));  
										
										echo $date;*/
									?>
								</label>	
							</td>

						</tr>-->
							
					</table>
					<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
						<tr><td id="ds_calclass">
						</td></tr>
						</table>
					<p id="pie" class="requiredText">* Campos Obligatorios</p>
					<div id="acciones">
						<input type="button" class="btnStandard" id="BtnReporte" value="Guardar"  onclick="guardarInfoCita();" />
						<input type="button" class="btnStandard" id="BtnCancelar" value="Cancelar" onclick="cancelarInfo();" /><br />
					</div>
						
				</div>	
			</div>	

			
		</form>
		
		

	</body>
</html>
<?php

	}

}

?>