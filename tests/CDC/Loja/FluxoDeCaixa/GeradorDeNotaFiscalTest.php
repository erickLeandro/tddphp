<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use \Mockery;

class GeradorDeNotaFiscalTest extends TestCase
{
  public function setUp()
  {
    parent::setUp();
  }

  public function testDeveGerarNFComImpostoDescontado()
  {
    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $dao->shouldReceive("executa")->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $sap->shouldReceive("executa")->andReturn(true);

    $gerador = new GeradorDeNotaFiscal(array($dao, $sap));
    $pedido = new Pedido("Joaquim", 1000, 1);
    $nf = $gerador->gera($pedido);
    $this->assertTrue($dao->executa($nf));
    $this->assertTrue($sap->executa($nf));
    $this->assertEquals(1000 * 0.94, $nf->getValor(), null, 0.00001);
  }

  public function testDeveExecutarAcoesPosteriores()
  {
    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $dao->shouldReceive("executa")->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $sap->shouldReceive("executa")->andReturn(true);

    $gerador = new GeradorDeNotaFiscal(array($dao, $sap));
    $pedido = new Pedido("Bruna marquezine", 5000, 1);
    $nf = $gerador->gera($pedido);
    $this->assertTrue($dao->executa($nf));
    $this->assertTrue($sap->executa($nf));
    $this->assertNotNull($nf);
  }
}    