<?php

namespace CDC\Loja;

use CDC\Loja\Test\TestCase;
use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class MaiorPrecoTest extends TestCase
{

  private $carrinho;

  public function setUp()
  {
    parent::setUp();
    $this->carrinho = new CarrinhoDeCompras();
  }
  
  public function testCartEmpty()
  {
      $valor = $this->carrinho->encontra();
      $this->assertEquals(0, $valor, null, 0.0001);
  }

  public function testCartWithOneProduct()
  {
    $this->carrinho->adiciona(new Produto("Xbox360", 800.00, 2));
    $valor = $this->carrinho->encontra();
    $this->assertEquals(1600.00, $valor, null, 0.0001);
  }

  public function testCartWithMultiplesProducts()
  {
    $this->carrinho->adiciona(new Produto("Xbox360", 800.00, 4));
    $this->carrinho->adiciona(new Produto("Xbox360", 600.00, 10));
    $this->carrinho->adiciona(new Produto("Xbox360", 900.00, 5));
    $valor = $this->carrinho->encontra();
    $this->assertEquals(6000.00, $valor, null, 0.0001);
  }

}    