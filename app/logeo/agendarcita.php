
<?php

 $texto="ERROR:";
 session_start();
//if(isset($_SESSION['user_id'])){
	   include_once "conexion.php";
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			mysql_select_db(DB_NAME,$con);
	if (isset($_REQUEST['infocita'])) {
	   $datos = json_decode($_REQUEST['infocita'],true);
       
	   if (!$con) {
	       echo $texto.mysql_error(); 
	   }
	   else {
	       mysql_query ("SET NAMES 'utf8'");
		   if (!mysql_select_db(DB_NAME)) {
			  echo $texto.mysql_error(); 
		   }
		   else {	
				$sql="INSERT INTO agenda VALUES (";
                $sql .= "0,";
                $sql .= "'".$datos['fecha']."',";
			    $sql .= "'".$datos['id_turno']."',";
			    $sql .= $datos['id_servicio'].",";		  
			    $sql .= $datos['id_medico'].",";
			    $sql .= "'".$datos['cedula']."',";
			    $sql .= "'".$datos['diagnostico']."',";
			    $sql .= "'".$datos['cirugia']."',0,0)";
			  	
		        $result = mysql_query($sql);
				if ($result) {
					echo  "EXITO";
				} 
				else {
					echo "ERRORR AL ACTUALIZAR ".$texto.mysql_error(); 
				}
				
		   }
	   }
	}
 	else {
	   echo $texto." Hacen falta los datos";
	}
 //}
 ?>
 
