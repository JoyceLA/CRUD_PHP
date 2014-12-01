<?php

require_once '../functions.php';
require_once '../Usuario.php';

class updateTest extends PHPUnit_Framework_TestCase{
		
	public function test_createUser(){
		$userNew = new Usuario("Juan","2323");
		

		$user0 = new Usuario("Maria23","452232Ga");
		$user1= new Usuario("Maria23333","6371222qwss");
		$user2 = new Usuario("Maria2782313","62hwsqwss");
		$user3= new Usuario("Juana62132","6323");
		
		$ArrayUsers = array($user0,$user1, $user2, $user3);
		$funcion = new Funciones();
		$funcion->createUser($ArrayUsers,$userNew);
		$create = $funcion->getMessageCreate();
		$this->assertEquals("CUENTA CREADA",$create);
	}

	public function test_searchUser(){
		$userNow = new Usuario("Maria23","452232Ga");
		

		$user0 = new Usuario("Maria23","452232Ga");
		$user1= new Usuario("Maria23333","6371222qwss");
		$user2 = new Usuario("Maria2782313","62hwsqwss");
		$user3= new Usuario("Juana62132","6323");
		
		$ArrayUsers = array($user0,$user1, $user2, $user3);
		$funcion = new Funciones();
		$funcion->searchUser($ArrayUsers,$userNow);
		$search = $funcion->getMessageSearch();
		$this->assertEquals("CUENTA ENCONTRADA",$search);
	}

	public function test_updateNull(){
		$userNow = new Usuario("Maria23","452232Ga");
		
		$userNew = new Usuario("Maria23","63723qwss");
		
		$ArrayUsers = array();

		$funcion = new Funciones();
		$funcion->updateProfile($ArrayUsers,$userNow,$userNew);
		$updateUser = $funcion->getMessageUpdate();
		$this->assertEquals("ERROR CUENTA NO ENCONTRADA",$updateUser);
	}

	public function test_updatePassSuccess(){
		$userNow = new Usuario("Maria23","452232Ga");
		$userNew = new Usuario("Maria23","63723qwss");

		/*******************************+*/

		$user0 = new Usuario("Maria23","452232Ga");
		$user1= new Usuario("Maria23333","6371222qwss");
		$user2 = new Usuario("Maria2782313","62hwsqwss");
		$user3= new Usuario("Juana62132","6323");
		
		$ArrayUsers = array($user0,$user1, $user2, $user3);
		$funcion = new Funciones();
		$funcion->updateProfile($ArrayUsers,$userNow,$userNew);
		$updateUser = $funcion->getMessageUpdate();
		$this->assertEquals("USUARIO ACTUALIZADO",$updateUser);
	}

	public function test_updateUserInvalid(){
		$userNow = new Usuario("Maria23","452232Ga");
		$userNew = new Usuario("Maria23","");


		/*******************************+*/

		$user0 = new Usuario("Maria2123","452232Ga");
		$user1= new Usuario("Maria23333","6371222qwss");
		$user2 = new Usuario("Maria2782313","62hwsqwss");
		$user3= new Usuario("Juana62132","6323");

		$ArrayUsers = array($user0,$user1, $user2, $user3);
		$funcion = new Funciones();
		$funcion->updateProfile($ArrayUsers,$userNow,$userNew);
		$updateUser = $funcion->getMessageUpdate();
		$this->assertEquals("USUARIO O CONTRASEÑA INVALIDO",$updateUser);
	}


	public function test_deleteUser(){
		$userNow = new Usuario("Maria23","452232Ga");
		

		$user0 = new Usuario("Maria23","452232Ga");
		$user1= new Usuario("Maria23333","6371222qwss");
		$user2 = new Usuario("Maria2782313","62hwsqwss");
		$user3= new Usuario("Juana62132","6323");
		
		$ArrayUsers = array($user0,$user1, $user2, $user3);
		$funcion = new Funciones();
		$funcion->deleteUser($ArrayUsers,$userNow);
		$delete = $funcion->getMessageDelete();
		$this->assertEquals("CUENTA ELIMINADA",$delete);
	}


}