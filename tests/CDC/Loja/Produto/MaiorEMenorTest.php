<?php

namespace CDC\Loja\Produto;

require "./vendor/autoload.php";

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;
use CDC\Loja\Produto\MaiorMenor;
use \PHPUnit_Framework_TestCase as PHPUnit;

class MaiorEMenorTest extends PHPUnit
{
  
  public function testOrdemDescrescente()
  {
    $carrinho = new CarrinhoDeCompras();

    $carrinho->adiciona(new Produto('Geladeira', 450.00));
    $carrinho->adiciona(new Produto('Liquidificador', 250.00));
    $carrinho->adiciona(new Produto('Jogo de pratos', 70.00));

    $maiorMenor = new MaiorMenor();
    $maiorMenor->encontra($carrinho);

    $this->assertEquals("Jogo de pratos", $maiorMenor->getMenor()->getNome());
    $this->assertEquals("Geladeira", $maiorMenor->getMaior()->getNome());
  }

  public function testHasOneProductInCart()
  {
    $carrinho = new CarrinhoDeCompras();

    $carrinho->adiciona(new Produto('PS4', 1000.00));

    $maiorMenor = new MaiorMenor();
    $maiorMenor->encontra($carrinho);

    $this->assertEquals('PS4', $maiorMenor->getMenor()->getNome());
    $this->assertEquals('PS4', $maiorMenor->getMaior()->getNome());

  }

  public function testOrdemCrescente()
  {
    $carrinho = new CarrinhoDeCompras();

    $carrinho->adiciona(new Produto('Jogo de pratos', 70.00));
    $carrinho->adiciona(new Produto('Liquidificador', 250.00));
    $carrinho->adiciona(new Produto('Geladeira', 450.00));

    $maiorMenor = new MaiorMenor();
    $maiorMenor->encontra($carrinho);

    $this->assertEquals("Jogo de pratos", $maiorMenor->getMenor()->getNome());
    $this->assertEquals("Geladeira", $maiorMenor->getMaior()->getNome());
  }

}    