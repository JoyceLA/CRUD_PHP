<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://localhost/")
    $this->open("/crud/app/bienvenido.php");
    $this->click("name=eliminar");
    $this->click("name=eliminar");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("css=h1"));
  }
}
?>