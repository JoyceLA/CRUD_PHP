
<?php
// hazreporte.php
 $texto="ERROR:";
 session_start();
if(isset($_SESSION['user_id'])){
	   include_once "conexion.php";
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			   mysql_select_db(DB_NAME,$con);
	if (isset($_REQUEST['info'])) {
	   $datos = json_decode($_REQUEST['info'],true);
       
	   if (!$con) {
	       echo $texto.mysql_error(); 
	   }
	   else {
	       mysql_query ("SET NAMES 'utf8'");
		   if (!mysql_select_db(DB_NAME)) {
			  echo $texto.mysql_error(); 
		   }
		   else {
		       $sql="INSERT INTO cuentas VALUES (";
               $sql .= "'".$datos['pass']."',";
               $sql .= "'".$datos['cuenta']."', 0)";
			   
			  
		       $result = mysql_query($sql);
				if ($result) {
					echo  "EXITO";
				}
				else {
					echo "ERROR ".$texto.mysql_error(); 
				}
		   }
	   }
	}
 	else {
	   echo $texto." ERROR AL REGISTRARSE";
	}
 }
 ?>
 
