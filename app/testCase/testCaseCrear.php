<?php
require_once '../PHPUnit/Extensions/Story/TestCase.php';
require_once '../functions.php';
require_once '../Usuario.php';

class testCaseCrear extends PHPUnit_Extensions_Story_TestCase
{

 
  /**
     * @scenario
     */
    public function crearUsuario()
    {
	
	

        $this->given('crear')
             ->when('accionCre', -1)		
             ->then('Score should be creado',"CUENTA CREADA");

    
    }


 

    public function runGiven(&$world, $action, $arguments)
    {
	
        switch($action) {
              case 'crear': {
                $world['act']  = new Funciones;
                $world['val'] = -2;
            }
	  
        }
    }

    public function runWhen(&$world, $action, $arguments)
    {
		$usering = array();
	        $usering[0] = new Usuario("Maria23", "452232Ga");

	        $usering[1] = new Usuario("Maria23333", "6371222qwss");

	        $usering[2] = new Usuario("Maria2782313", "62hwsqwss");

	        $usering[3] = new Usuario("Juana62132", "6323");
		$userNuevi = new Usuario("Juana", "6223");
	
        switch($action) {
		
            case 'accionCre': {
		
	
                $world['act']->createUser($usering,$userNuevi);
                $world['val']=$world['act']->create;
            }
        
        }
    }

    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
             case 'Score should be creado': {
             

                $this->assertEquals("CUENTA CREADA", $world['act']->getMessageCreate());
		
            }
            
        }
    }
}
?>
