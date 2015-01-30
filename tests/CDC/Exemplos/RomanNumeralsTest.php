<?php

namespace CDC\Exemplos;

require "./vendor/autoload.php";

use CDC\Exemplos\RomanNumberConverter;
use \PHPUnit_Framework_TestCase as PHPUnit;

class RomanNumeralsTest extends PHPUnit
{
  public function testHasUnderstandanSymbolI()
  {
    $roman = new RomanNumberConverter();
    $number = $roman->convert('I');
    $this->assertEquals(1, $number);
  }

  public function testHasUnderstandanSymbolV()
  {
    $roman = new RomanNumberConverter();
    $number = $roman->convert('V');
    $this->assertEquals(5, $number);
  }

  public function testHasUnderstandanSymbolII()
  {
    $roman = new RomanNumberConverter();
    $number = $roman->convert('II');
    $this->assertEquals(2, $number);
  }

  public function testHasUnderstandanSymbolXXII()
  {
    $roman = new RomanNumberConverter();
    $number = $roman->convert('XXII');
    $this->assertEquals(22, $number);
  }

}