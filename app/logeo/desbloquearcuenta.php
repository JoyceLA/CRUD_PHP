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
			<link rel="stylesheet" href="estilos/stylecuenta.css" type="text/css" />
			
			<script src="scripts/scripts.js" type="text/javascript"></script>
			<title>Reporte de Servicio</title>
		</head>
		<body class="form_report">
			<div class="fondo_admin">	
				<br/>
				<div class="fondo_form_cuenta">
					<center>
						<table id="tbl_cuenta"  cellpadding="4" cellspacing="7">
							<tr>
								<th>USUARIO</th>
								<th>NOMBRE</th>
								<th>ESTADO</th>
							</tr>
							<?php
								$result = mysql_query("SELECT c.cuenta, CONCAT_WS(  ' ', m.nombres, m.ap_paterno, m.ap_materno ),
								 c.block FROM cuentas c JOIN medicos m ON c.cuenta = m.cedula ORDER BY c.cuenta ASC ");
								if ($result) {
									$n = mysql_num_rows($result);
									for ($i=0; $i<$n; $i++) {
										$registro = mysql_fetch_row($result);
										echo "<tr>";
										echo "<td>".$registro[0]."</td>";
										echo "<td>".$registro[1]."</td>";
										if($registro[2]==1){//Bloqueado
											echo "<td bgcolor=#DF0101 onClick=\"desbloquear(this, document.getElementById('".$registro[0]."'),'".$registro[0]."');\"></td>";
										}
										else{
											echo "<td bgcolor=#298A08 onClick=\"desbloquear(this, document.getElementById('".$registro[0]."'),'".$registro[0]."');\"></td>";
										}
										echo "<td id=".$registro[0]." style=\"display:none;\">".$registro[2]."</td>";
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
		</div>
			<!--<div id="acciones">
				<input type="button" class="btnStandard" id="BtnCancelar" value="Regresar" onclick="regresar();" /><br />
			</div>-->
		</body>
</html>