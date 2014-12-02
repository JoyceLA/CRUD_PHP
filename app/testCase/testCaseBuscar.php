<?php
require_once '../PHPUnit/Extensions/Story/TestCase.php';
require_once '../functions.php';
require_once '../Usuario.php';

class testCaseBuscar extends PHPUnit_Extensions_Story_TestCase
{

    /**
     * @scenario
     */
    public function buscarUsuario()
    {
	 $nuevoObjeto = new Funciones();
	

        $this->given('buscar')
             ->when('accionBus', 1)		
             ->then('Score should be  encontrado',"CUENTA ENCONTRADA");

    
    }
 


 

    public function runGiven(&$world, $action, $arguments)
    {
	 
        switch($action) {
          case 'buscar': {
                $world['actividad1']  = new Funciones;
                $world['valor1'] = -2;
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
		$userNuevi = new Usuario("Juana", "6323");
	
        switch($action) {
		
           case 'accionBus': {
		
	
                $world['actividad1']->searchUser($usering,  $usering[3]);
                $world['valor1']=$world['actividad1']->search;
            }
	
         
        
        }
    }

    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
          case 'Score should be  encontrado': {
             

                $this->assertEquals("CUENTA ENCONTRADA", $world['actividad1']->getMessageSearch());
		
            }
            
        }
    }
}
?>
