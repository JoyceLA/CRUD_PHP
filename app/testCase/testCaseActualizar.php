<?php
require_once '../PHPUnit/Extensions/Story/TestCase.php';
require_once '../functions.php';
require_once '../Usuario.php';

class testCaseActualizar extends PHPUnit_Extensions_Story_TestCase
{

    /**
     * @scenario
     */
    public function actualizarUsuario()
    {
	 $nuevoObjeto = new Funciones();
	

        $this->given('modificar')
             ->when('accionAc', 1)		
             ->then('Score should be actualizado', "USUARIO ACTUALIZADO");

    
    }



 

    public function runGiven(&$world, $action, $arguments)
    {
	 $world['actividad1']  = new Funciones;
        switch($action) {
            case 'modificar': {
               
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
		
            case 'accionAc': {
		
                $world['actividad1']->updateProfile($usering, $usering[3],$userNuevi);
                $world['valor1']=$world['actividad1']->update;
            }     
	
         
        
        }
    }

    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Score should be actualizado': {
             

                $this->assertEquals("USUARIO ACTUALIZADO", $world['actividad1']->getMessageUpdate());
		
            }
            
        }
    }
}
?>
