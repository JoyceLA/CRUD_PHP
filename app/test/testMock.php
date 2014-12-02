<?php
require_once '../functions.php';

class MockTest extends PHPUnit_Framework_TestCase
{
    public function testMock()
    {
        $arr = array();
        $context = $this->getMockBuilder('Funciones')//Objeto del mock
           ->getMock();

        $context->expects($this->once())//Numero de veces que sera llamado
           ->method('encryptPass')//Nombre del metodo
           ->with($this->logicalOr(
                     $this->equalTo('RASAHolaRSSA')
            ))
           ->will($this->returnValue($arr));

        $context->encryptPass('RASAHolaRSSA');
       
    }
}
