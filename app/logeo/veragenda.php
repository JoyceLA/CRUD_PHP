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
	$username ="";
	$pass = "";
	if (isset($_SESSION['user_id'])){
		if(isset($_SESSION['pass'])){
			$username=$_SESSION["user_id"]; 
			$pass=$_SESSION["pass"];
					
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
			<link rel="stylesheet" href="estilos/styleLogin.css" type="text/css" />
			<link rel="stylesheet" href="estilos/styleagenda.css" type="text/css" />
			
			<script src="scripts/script_agenda.js" type="text/javascript"></script>
			<title>Ver Agenda</title>
		</head>
		<body class="form_report">

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
				<div id="salida">
					<a href="logout.php">Terminar sesión</a>
				</div>
				<br/>
				
				<div class="fondo_form_ver_agenda">
					<center>
						<table id="tbl_ver_agenda"  cellpadding="3" cellspacing="2" border="1">
							<tr>
								<th style="display:none">NUMERO_AGENDA</th>
								<th width="80">FECHA</th>
								<th>TURNO</th>
								<th>SERVICIO</th>
								<th style="display:none">MEDICO</th>
								<th>CEDULA</th>
								<th>PACIENTE</th>
								<th>EDAD</th>
								<th>DIAGNOSTICO</th>
								<th>CIRUGIA</th>
								<th colspan="2">QUIROFANO</th>
								
							</tr>
							<?php
								$result = mysql_query("SELECT num_agenda, fecha, a.id_turno,s.id_servicio, s.nombre,
									CONCAT_WS(' ',m.titulo,m.nombres,m.ap_paterno,m.ap_materno), p.cedula,
									CONCAT_WS(' ',p.nombres, p.ap_paterno, p.ap_materno), p.edad,
									diagnostico, cirugia, id_quirofano from agenda a
										join servicios s on (a.id_servicio = s.id_servicio)
										join medicos m on (m.id_medico = a.id_medico)
        							    join pacientes p on (p.cedula = a.cedula)
        							WHERE m.cedula= '".$username."'
								 ORDER BY fecha ASC");
								if ($result) {
									$n = mysql_num_rows($result);
									for ($i=0; $i<$n; $i++) {
										$registro = mysql_fetch_row($result);
										$date1 = strtotime($registro[1]);
										$date2 = strtotime(date("Y-m-d"));

										//vALIDAR QUE SE HAYA REALIZADO LA CIRUGIA
										if($registro[10] == ""){
											if($date1 < $date2){
												echo "<tr bgcolor=#DF0101>";
											}
										}
										else{echo "<tr>";}
										echo "<td id='cld".$registro[0]."' style=\"display:none\">".$registro[0]."</td>";
										list($year, $month, $day) = explode('-', $registro[1]);
										$fechaBD= $day."/".$month."/".$year;
										
										
										//Validar que solo se muestren las citas que sean mayores a la fecha actual
										if($date1 >= $date2){
											
											echo "<td>".$fechaBD."</td>";
											echo "<td>".$registro[2]."</td>";
											echo "<td style=\"display:none\">".$registro[3]."</td>";
											echo "<td>".$registro[4]."</td>";
											echo "<td style=\"display:none\">".$registro[5]."</td>";
											echo "<td>".$registro[6]."</td>";
											echo "<td>".$registro[7]."</td>";
											echo "<td>".$registro[8]."</td>";
											echo "<td>".$registro[9]."</td>";
											echo "<td>".$registro[10]."</td>";
									
											if($registro[11]==0){
												echo "<td bgcolor=#DF0101>SIN ASIGNAR</td>";
											}
											else{
												echo "<td bgcolor=#298A08>No. ".$registro[11]."</td>";
											}
											echo "</tr>";
											
										}
									}
									mysql_free_result($result);
								}
								
							
								
								/**
								 * Obtener el día de la semana para una fecha concreta.
								 */
								function diaSemana($dia,$mes,$ano){
								    // 0->domingo     | 6->sabado
								    $num_dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));
								    $dia = "";
								    switch ($num_dia) {
								    	case 0:
								    		$dia = "DOMINGO";
								    		break;
								    	case 1:
								    		$dia = "LUNES";
								    		break;
								    	case 2:
								    		$dia = "MARTES";
								    		break;
								    	case 3:
								    		$dia = "MIERCOLES";
								    		break;
								    	case 4:
								    		$dia = "JUEVES";
								    		break;
								    	case 5:
								    		$dia = "VIERNES";
								    		break;
								    	case 6:
								    		$dia = "SABADO";
								    		break;
								    	
								    }
								    return $dia;
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
