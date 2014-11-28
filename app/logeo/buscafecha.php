
<?php
// obtendepartamentos.php
 $texto="ERROR:";
 session_start();
 
    
	
    if (isset($_REQUEST['infofecha']))  {
	   $datos = json_decode($_REQUEST['infofecha'],true);
	   
	   
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
				$result = mysql_query("SELECT DISTINCT dia FROM salas WHERE id_servicio=".$datos['id_servicio']." AND id_turno='".$datos['id_turno']."' ORDER BY dia ");
				if ($result) {
					$n = mysql_num_rows($result);

					if($n > 0){
						for ($i=0; $i<$n; $i++) {
							$registro = mysql_fetch_row($result);

							$day = "";
							if($registro[0] == "LUNES"){
								$day = "Monday";
							}
							else if($registro[0] == "MARTES"){
								$day = "Tuesday";
							}
							else if($registro[0] == "MIERCOLES"){
								$day = "Wednesday";
							}
							else if($registro[0] == "JUEVES"){
								$day = "Thursday";
							}
							else if($registro[0] == "VIERNES"){
								$day = "Friday";
							}
							else if($registro[0] == "SABADO"){
								$day = "Saturday";
							}
							else if($registro[0] == "DOMINGO"){
								$day = "Sunday";
							}
							//$day = date('l', strtotime('2014-10-15'));
							$fecha = date('Y-m-j');
							$date=date("Y-m-d", strtotime ("next ".$day));  
							
							$result2 = mysql_query("SELECT COUNT(num_agenda), fecha FROM agenda WHERE fecha='".$date."' and id_medico =".$datos['id_medico']);
							if ($result2) {
								$n2 = mysql_num_rows($result2);
								$registro2 = mysql_fetch_row($result2);
								if($registro2[0] >=0 AND $registro2[0]< 5){
									echo "<option value=\"".$date."\">".$registro[0].", ".$date."</option>\n";
								}
							}
							else{
								echo "ERROR";
							}
							//echo $date;


							
						}
					}
					else{
						echo "VACIO";
					}
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
 
