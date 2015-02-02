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
    $desenvolvedor = new Funcionario("Andre", 1500.0, "desenvolvedor");
    $salario = $calculadora->calculaSalario($desenvolvedor);
    $this->assertEquals(1500.0 * 0.9, $salario, null, 0.00001);

  }  

  /*public function testSalarioDesenvolvedorAcimaLimite()
  {
    $calculadora = new CalculadoraSalario();
    $desenvolvedor = new Funcionario("Andre", 4000.0, Cargo::DESENVOLVEDOR);
    $salario = $calculadora->calculaSalario($desenvolvedor);
    $this->assertEquals(4000.0 * 0.8, $salario, null, 0.00001);

  }  

  public function testSalarioDbaAbaixoLimite()
  {
    $calculadora = new CalculadoraSalario();
    $dba = new Funcionario("Andre", 500.0, Cargo::DBA);
    $salario = $calculadora->calculaSalario($dba);
    $this->assertEquals(500.0 * 0.85, $salario, null, 0.00001);

  }  */

}    