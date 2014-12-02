<?php

require_once 'Testing/Selenium.php';

class Example extends PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
    $this = new Testing_Selenium("*chrome", "http://localhost/")
    $this->open("/crud/app/index.php");
    $this->type("name=user", "drake");
    $this->type("name=user", "drake");
    $this->type("name=password", "123");
    $this->type("name=password", "123");
    $this->click("name=login");
    $this->click("name=login");
    $this->waitForPageToLoad("30000");
    $this->assertTrue($this->isElementPresent("name=eliminar"));
  }
}
?>