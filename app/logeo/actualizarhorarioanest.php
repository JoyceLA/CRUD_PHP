
<?php
// hazreporte.php
 $texto="ERROR:";
 session_start();
//if(isset($_SESSION['user_id'])){
	   include_once "conexion.php";
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			mysql_select_db(DB_NAME,$con);
	if (isset($_REQUEST['info_horario_anest'])) {
	   $datos = json_decode($_REQUEST['info_horario_anest'],true);
       
	   if (!$con) {
	       echo $texto.mysql_error(); 
	   }
	   else {
	       mysql_query ("SET NAMES 'utf8'");
		   if (!mysql_select_db(DB_NAME)) {
			  echo $texto.mysql_error(); 
		   }
		   else {
		       $sql="UPDATE anestesiologos SET ";
               $sql .= "num_sala=".$datos['num_sala'].", ";
			   $sql .= "id_turno='".$datos['id_turno']."' ";
			   $sql .= "WHERE id_anest=".$datos['id_anestesiologo'];
			   
			  
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
 
