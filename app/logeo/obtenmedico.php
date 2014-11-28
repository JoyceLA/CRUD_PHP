
<?php
// obtendepartamentos.php
 $texto="ERROR:";
 session_start();
 
    
	
    if (isset($_REQUEST['idmedico']))  {
	   $idmedico = $_REQUEST['idmedico'];
	   
	   include_once "conexion.php";
	   $con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	   mysql_select_db(DB_NAME,$con);
	   if (!$con) {
			die('No me pude conectar: ' . mysql_error());
		}
	   else {
	       mysql_query ("SET NAMES 'utf8'");
			if (!mysql_select_db(DB_NAME)){
				die("No pude seleccionar la base de datos ".DB_NAME);
		    }
		   else {
				$result = mysql_query("SELECT * FROM medicos WHERE id_medico=".$idmedico);
				if ($result) {
					$n = mysql_num_rows($result);
					$registro = mysql_fetch_row($result);
					$datos['id_medico'] = $registro[0];
					$datos['cedula'] = $registro[1];
					$datos['nombre'] = $registro[2]." ".$registro[5]." ".$registro[3]." ".$registro[4];
					$datos['telefono'] = $registro[6];
					$datos['hrentrada'] = $registro[7];
					$datos['hrsalida'] = $registro[8];
					header("Content-Type: application/json");
					echo json_encode($datos);
					
					mysql_free_result($result);

				}	

				else {
					echo $texto.mysql_error(); 
				}
		   }
	   }
    } 
    else {
	   echo $texto." Hace falta el texto a buscar";
	}
 
 
 ?>
 
