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

		

	 $num_reporte = "";
	 $depto = "0";
	 $unidad = "0";
	 $empleado = "";
	 $serie = "";
	 $descp = "";
	 $clave = "CAAJ621027";
	
	$fecha="14-05-10";
	$medico = "";
	$result = mysql_query("SELECT * FROM medicos WHERE cedula='CAAJ621027'");
		
		if($result) {
		
			$n = mysql_num_rows($result);
			for ($i=0; $i<$n; $i++) {
				$registro = mysql_fetch_row($result);

				$medico = ($registro[2])." ".$registro[5]." ".$registro[3]." ".$registro[4];
			}
			
		}



	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			
			<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
			<script src="scripts/script_programacion.js" type="text/javascript"></script>
			<title>Reporte de Servicio</title>
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
				<!--<fieldset class="rounded">
					<legend>REPORTE</legend>    -->
				
					<div class="fondo_form">
					<table id="tbl_dir">
					   <tr>
							<td>
								<form name="medico">
									Médico:<input type="text" name="inMedico" id="inMedico" value="<?php echo $medico ?>" size="50" disabled/>
										
								</form>
								<p id="mjs_error" class="error"></p>
							</td>
							
						</tr>
						<tr>
							<td>
								TURNO: <select id = "sel_turno" name="sel_turno" onchange="activarCalendario(this);" >
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
								Cedula:<input type="text" name="inCedula" id="inCedula" value="" onBlur="obtenerDatos();"/><br/>
								Paciente:<input type="text" name="inPaciente" id="inPaciente" value="" disabled size="50"/>
								Edad:<input type="text" name="inEdad" id="inEdad" value="" size="3"/>
							</td>
							
						</tr>
						
						<tr>
							<td>
								<span class="space">
								<label for="txta_descpReport">Descripción del Servicio</label><br/>
								<textarea id="descpReport" class="txta_descpReport" rows="15" cols="100" ><?php echo $descp?></textarea>
							<span id="obligatorio" class="requiredText">*</span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="space">
								<label for="sel_servicio">Atendió al servicio</label>
								<select id = "sel_servicio" name="sel_servicio"  >
									<option value="0">Selecciona...</option>
									<?php
		 
										$result = mysql_query("SELECT * FROM cuentas");
										if ($result) {
											$n = mysql_num_rows($result);
											for ($i=0; $i<$n; $i++) {
												$registro = mysql_fetch_row($result);
												echo "<option value=\"".$registro[0]."\"";
												
												$nombreCompleto = $registro[2]." ".$registro[3]." ".$registro[4]." ".$registro[5];
												echo ">".$nombreCompleto."</option>\n";
											}
											mysql_free_result($result);
										}
										
									?>								
								</select>
							<span id="obligatorio" class="requiredText">*</span></span>
							</td>
						</tr>
							
					</table>
					<p id="pie" class="requiredText">* Campos Obligatorios</p>
					<div id="acciones">
						<input type="button" class="btnStandard" id="BtnReporte" value="Guardar"  onclick="guardarInfo();" />
						<input type="button" class="btnStandard" id="BtnFinalizar" value="Finalizar"  onclick="finalizar();" disabled />
						<input type="button" class="btnStandard" id="BtnCancelar" value="Cancelar" onclick="cancelarInfo();" /><br />
					</div>
					<!--<input type="button" class="btnStandard" id="BtnModificar" value="Modificar" <?php<// if (empty($RFC)) echo " disabled "; ?> onclick="habilitaModificacion(false,false);" /><br />
					<input type="button" class="btnStandard" id="BtnEliminar" value="Eliminar" <?php// if (empty($RFC)) echo " disabled "; ?> onclick="eliminarUsuario();" /><br />
						-->
						
						
					</div>	
				</div>	

			
		</form>
		
		

</body>
</html>