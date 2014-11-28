
<?php
// hazreporte.php
 $texto="ERROR:";
 session_start();
//if(isset($_SESSION['user_id'])){
	   include_once "conexion.php";
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			mysql_select_db(DB_NAME,$con);
	if (isset($_REQUEST['infomedico'])) {
	   $datos = json_decode($_REQUEST['infomedico'],true);
       
	   if (!$con) {
	       echo $texto.mysql_error(); 
	   }
	   else {
	       mysql_query ("SET NAMES 'utf8'");
		   if (!mysql_select_db(DB_NAME)) {
			  echo $texto.mysql_error(); 
		   }
		   else {
		       $sql="UPDATE medicos SET ";
               $sql .= "telefono= '".$datos['telefono']."', ";
			   $sql .= "hora_entrada=".$datos['hrentrada'].", ";
			   $sql .= "hora_salida=".$datos['hrsalida']." ";
			   $sql .= "WHERE id_medico=".$datos['id_medico'];
			   
			  
		       $result = mysql_query($sql);
				if ($result) {
					echo  "EXITO";
				}
				else {
					echo "ERRORR-->> ".$texto.mysql_error(); 
				}
		   }
	   }
	}
 	else {
	   echo $texto." Hacen falta los datos";
	}
 //}
 ?>
 
