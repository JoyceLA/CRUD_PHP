<?php

class Delete {
   



    function delete_user($arreglo,$nombre,$contrasenia) {
	 $contador=0;
     foreach ($arreglo as &$valor) {
		
		if ($valor->usuario == $nombre){
			
			
			if($valor->password == $contrasenia){

	
				echo "iguales";
				echo $valor->usuario;
				unset($arreglo[$contador]);
			}
		}
	$contador+=1;

	}
	return $arreglo;


    }

    

        
}
?>
