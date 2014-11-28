<?php
 
//DATOS PARA LA CONEXION A LA BASE DE DATOS
define('DB_SERVER','localhost');
define('DB_NAME','agenda');
define('DB_USER','ISSSTE');
define('DB_PASS','issste123');
 
    if(!$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS) ){
    	echo 'Error no se conecto'.mysql_connect_error();
    }else{
    	echo 'Si se conecto';
    }
    mysql_select_db(DB_NAME,$con);
 
?>