
<?php
// obtendepartamentos.php
 $texto="ERROR:";
 session_start();
 
    
	
    if (isset($_REQUEST['medico_nombre']))  {
	   $textobusq = $_REQUEST['medico_nombre'];
	   
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
				$result = mysql_query("SELECT * FROM medicos WHERE nombres LIKE '%".$textobusq."%' OR ap_paterno LIKE '%".$textobusq."%' ORDER BY ap_paterno ASC");
				if ($result) {
					$n = mysql_num_rows($result);
					if($n > 0){
						for ($i=0; $i<$n; $i++) {
							$registro = mysql_fetch_row($result);
							echo "<option value=\"".$registro[0]."\"";
							$nombreCompleto = $registro[2]." ".$registro[3]." ".$registro[4].", ".$registro[5];
							echo ">".$nombreCompleto."</option>\n";
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
 
