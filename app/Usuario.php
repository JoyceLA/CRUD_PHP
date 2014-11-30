<?php 

class Usuario{
	private $user;
	private $password;

    function Usuario($us,$pass){
        $this->user = $us;
        $this->password = $pass;
    }

    public function setUser($Usuario){
    	$this->user = $Usuario;
    }

    public function getUser(){
    	return $this->user;
    }

    public function setPassword($pass){
    	$this->password = $pass;
    }

    public function getPassword(){
    	return $this->password;
    }

}


?>
