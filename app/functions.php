<?php
		
	class Funciones{	
		private $create = -2;
		private $delete = -2;
		private $update = -2;
		private $search = -2;

		function getMessageUpdate(){
			if($this->update == 1){
				return "USUARIO ACTUALIZADO";
			}
			elseif ($this->update == -1) {
				return "ERROR CUENTA NO ENCONTRADA";
			}
			elseif($this->update == 0){
				return "USUARIO O CONTRASEÑA INVALIDO";
			}
		}

		function updateProfile($ArrayUsers,$userNow,$userNew){
			$longitud = count($ArrayUsers);
			$boolean = 0;
			if($longitud >0){
				if($userNew->getUser() == ""){
					$this->update = 0;
					$boolean = 1;
				}
				if( $userNew->getPassword() == ""){
					$this->update = 0;
					$boolean = 1;
				}
				if($boolean == 0){
					for ($i=0; $i < $longitud; $i++) { 
						if(($ArrayUsers[$i]->getUser() == $userNow->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNow->getPassword())){
							$ArrayUsers[$i]->setUser($userNew->getUser());
							$ArrayUsers[$i]->setPassword($userNew->getPassword());
							$this->update = 1;
						}	
					}
					if($this->update != 1){
						$this->update = -1;
					}
				   
				}
			}
			else{
				$this->update = -1;
			}
			return $ArrayUsers;
		}
		function getMessageSearch(){
			if($this->search == 1){
				return "CUENTA ENCONTRADA";
			}
			elseif ($this->search == -1) {
				return "ERROR CUENTA NO ENCONTRADA";
			}
			elseif($this->search == 0){
				return "USUARIO O CONTRASEÑA INVALIDO";
			}
		}

		function searchUser($ArrayUsers,$userNow){
			$longitud = count($ArrayUsers);
			$boolean = 0;
			if($longitud >0){
				if($userNow->getUser() == ""){
					$this->search = 0;
					$boolean = 1;
				}
				if( $userNow->getPassword() == ""){
					$this->search = 0;
					$boolean = 1;
				}
				if($boolean == 0){
					for ($i=0; $i < $longitud; $i++) { 
						if(($ArrayUsers[$i]->getUser() == $userNow->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNow->getPassword())){
							$this->search = 1;
							
						}	
					}
					if($this->search != 1){
						$this->search = -1;
					}
						
				}
			}
			else{
				$this->search = -1;
			}
			return $ArrayUsers;
		}



		function getMessageDelete(){
			if($this->delete == 1){
				return "CUENTA ELIMINADA";
			}
			elseif ($this->delete == -1) {
				return "ERROR CUENTA NO ENCONTRADA";
			}
			elseif($this->delete == 0){
				return "USUARIO O CONTRASEÑA INVALIDO";
			}
		}

		function deleteUser($ArrayUsers,$userNow){
			$longitud = count($ArrayUsers);
			$boolean = 0;
			if($longitud >0){
				if($userNow->getUser() == ""){
					$this->delete = 0;
					$boolean = 1;
				}
				if( $userNow->getPassword() == ""){
					$this->delete = 0;
					$boolean = 1;
				}
				if($boolean == 0){ 
					for ($i=0; $i < $longitud; $i++) { 
						if(($ArrayUsers[$i]->getUser() == $userNow->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNow->getPassword())){
							unset($ArrayUsers[$i]);
							$this->delete = 1;
							
						}	
					}
					if($this->delete != 1){
						$this->delete = -1;
					}
					
				}
			}
			else{
				$this->delete = -1;
			}
			return $ArrayUsers;
		}

		
		function getMessageCreate(){
			if($this->create == 1){
				return "CUENTA YA EXISTE";
			}
			elseif ($this->create == -1) {
				return "CUENTA CREADA";
			}
			elseif($this->create == 0){
				return "USUARIO O CONTRASEÑA INVALIDO";
			}
			
		}

		function createUser($ArrayUsers,$userNew){
			$longitud = count($ArrayUsers);
			$boolean = 0;
			if($longitud >0){
				if($userNew->getUser() == ""){
					$this->create = 0;
					$boolean = 1;
				}
				if( $userNew->getPassword() == ""){
					$this->create = 0;
					$boolean = 1;
				}
				if($boolean == 0){ 
					for ($i=0; $i < $longitud; $i++) { 
						if(($ArrayUsers[$i]->getUser() == $userNew->getUser()) and ($ArrayUsers[$i]->getPassword() == $userNew->getPassword())){
							$this->create = 1;
							
						}	
					}
					$ArrayUsers[$longitud] = $userNew;
					if($this->create != 1){
						$this->create = -1;
					}
					
				}
						
			}
			return $ArrayUsers;
		}

	}

?>
