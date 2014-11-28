
<?php
// obtendepartamentos.php
 $texto="ERROR:";
 session_start();
 
    
	
    if (isset($_REQUEST['idturno']))  {
	   $idturno = $_REQUEST['idturno'];
	   
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
				$result = mysql_query("SELECT DISTINCT s.id_servicio, sv.nombre FROM salas s JOIN servicios sv ON s.id_servicio = sv.id_servicio
										WHERE s.id_turno ='".$idturno."' ORDER BY sv.nombre ASC");
				if ($result) {
					$n = mysql_num_rows($result);
					for ($i=0; $i<$n; $i++) {
						$registro = mysql_fetch_row($result);
						echo "<option value=\"".$registro[0]."\"";
						
						echo ">".$registro[1]."</option>\n";
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
	   echo $texto." Hace falta el idunidad";
	}
 
 
 ?>
 
