<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://ingsoftware.reduaz.mx/");
  }

  public function testMyTestCase()
  {
    $this->open("/tutorias/index.php");
    $this->click("id=registrar");
    $this->selectFrame("frameMain");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("name=Usuario")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("name=Usuario", "wqeqwe");
    $this->click("name=disponibilidad");
    $this->assertEquals("Verifica la disponiblidad", $this->getAttribute("name=txtconfirm@value"));
  }
}
?>
