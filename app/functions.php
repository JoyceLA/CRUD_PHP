<?php
		
	class Funciones{	
		function updateProfile($ArrayUsers,$userNow,$userNew){
			$longitud = count($ArrayUsers);

			if($longitud >0){
				if($userNew->getUser() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				if( $userNew->getPassword() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				for ($i=0; $i < $longitud; $i++) { 
					if(($ArrayUsers[$i]->getUser() == $userNow->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNow->getPassword())){
						$ArrayUsers[$i]->setUser($userNew->getUser());
						$ArrayUsers[$i]->setPassword($userNew->getPassword());
						return "USUARIO ACTUALIZADO";
						break;
					}	
				}
				return "ERROR CUENTA NO ENCONTRADA";
			}
			else{
				return "ERROR CUENTA NO ENCONTRADA";
			}
		}

		function searchUser($ArrayUsers,$userNow){
			$longitud = count($ArrayUsers);

			if($longitud >0){
				if($userNow->getUser() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				if( $userNow->getPassword() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				for ($i=0; $i < $longitud; $i++) { 
					if(($ArrayUsers[$i]->getUser() == $userNow->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNow->getPassword())){
						return "CUENTA ENCONTRADA";
						
					}	
				}
				return "ERROR CUENTA NO ENCONTRADA";
			}
			else{
				return "ERROR CUENTA NO ENCONTRADA";
			}
		}

		function deleteUser($ArrayUsers,$userNow){
			$longitud = count($ArrayUsers);

			if($longitud >0){
				if($userNow->getUser() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				if( $userNow->getPassword() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				for ($i=0; $i < $longitud; $i++) { 
					if(($ArrayUsers[$i]->getUser() == $userNow->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNow->getPassword())){
						$ArrayUsers[$i]= null;
						return "CUENTA ELIMINADA";
						
					}	
				}
				return "ERROR CUENTA NO ENCONTRADA";
			}
			else{
				return "ERROR CUENTA NO ENCONTRADA";
			}
		}

		function createUser($ArrayUsers,$userNew){
			$longitud = count($ArrayUsers);

			if($longitud >0){
				if($userNew->getUser() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				if( $userNew->getPassword() == ""){
					return "USUARIO O CONTRASEÑA INVALIDO";
				}
				for ($i=0; $i < $longitud; $i++) { 
					if(($ArrayUsers[$i]->getUser() == $userNew->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNew->getPassword())){
						return "CUENTA YA EXISTE";
						
					}	
				}
				$ArrayUsers[$longitud] = $userNew;
				return "CUENTA CREADA";
						
			}
			else{
				return "ERROR CUENTA NO CREADA";
			}
		}

	}

?>
