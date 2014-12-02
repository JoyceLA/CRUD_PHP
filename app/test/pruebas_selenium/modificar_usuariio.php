<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://localhost/")
    $this->open("/crud/app/bienvenido.php");
    $this->type("name=user", "dragula");
    $this->type("name=user", "dragula");
    $this->click("name=modificar");
    $this->click("name=modificar");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("//body/div[2]"));
  }
}
?>