<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use CDC\Loja\RH\CalculadoraSalario;
use CDC\Loja\RH\Funcionario;
use CDC\Loja\RH\Cargo;
use \PHPUnit_Framework_TestCase as PHPUnit;

class CalculadoraSalarioTest extends PHPUnit
{
  
  public function testSalarioDesenvolvedorAbaixoLimite()
  {
    $calculadora = new CalculadoraSalario();
    $desenvolvedor = new Funcionario("Andre", 1500.0, Cargo::DESENVOLVEDOR);
    $salario = $calculadora->calculaSalario($desenvolvedor);

    $this->assertEquals(1500.0 * 0.9, $salario, null, 0.00001);

  }  

}    