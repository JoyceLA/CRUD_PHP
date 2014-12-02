<?php
require_once '../PHPUnit/Extensions/Story/TestCase.php';
require_once '../functions.php';
require_once '../Usuario.php';

class testCaseBorrar extends PHPUnit_Extensions_Story_TestCase
{
 /**
     * @scenario
     */
    public function borrarUsuario()
    {
	 $nuevoObjeto = new Funciones();
	

        $this->given('borrar')
             ->when('accionBor', 1)		
             ->then('Score should be borrado',"CUENTA ELIMINADA");

    
    }


 

    public function runGiven(&$world, $action, $arguments)
    {
	 $world['actividad1']  = new Funciones;
        switch($action) {
             case 'borrar': {
                
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
		
             case 'accionBor': {
		
	
                $world['actividad1']->deleteUser($usering, $usering[1]);
                $world['valor1']=$world['actividad1']->delete;
            }   
	
         
        
        }
    }

    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Score should be borrado': {
             

                $this->assertEquals("CUENTA ELIMINADA", $world['actividad1']->getMessageDelete());
		
            }
            
        }
    }
}
?>
