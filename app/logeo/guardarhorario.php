
<?php

 $texto="ERROR:";
 session_start();
//if(isset($_SESSION['user_id'])){
	   include_once "conexion.php";
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			mysql_select_db(DB_NAME,$con);
	if (isset($_REQUEST['info_horario'])) {
	   $datos = json_decode($_REQUEST['info_horario'],true);
       
	   if (!$con) {
	       echo $texto.mysql_error(); 
	   }
	   else {
	       mysql_query ("SET NAMES 'utf8'");
		   if (!mysql_select_db(DB_NAME)) {
			  echo $texto.mysql_error(); 
		   }
		   else {

		   		//CONSULTO EL ID SIGUIENTE DE LA BASE DE DATOS
		   		$sql = "SELECT MAX(id_sala) FROM salas WHERE num_sala=".$datos['num_sala'].";";
			  	
		       $result = mysql_query($sql);
				if ($result) {
					$fila = mysql_fetch_row($result);
					if($fila[0] == 0){
						$newid = ($datos['num_sala']*1000);
					}
					else{
						$newid = $fila[0]+1;
					}
					
					$sql="INSERT INTO salas VALUES (";
	                $sql .= $newid.",";
	                $sql .= $datos['num_sala'].",";
				    $sql .= "'".$datos['dia']."',";
				    $sql .= $datos['id_servicio'].",";		  
				    $sql .= "'".$datos['id_turno']."')";
				  	echo "$result ".$newid;
			        $result = mysql_query($sql);
					if ($result) {
						echo  "EXITO";
					}
					else {
						echo "ERROR AL ACTUALIZAR ".$texto.mysql_error(); 
					}
				}
				else {
					echo "ERROR ".$texto.mysql_error(). " ".$result;
				}
		   }
	   }
	}
 	else {
	   echo $texto." Hacen falta los datos";
	}
 //}
 ?>
 
