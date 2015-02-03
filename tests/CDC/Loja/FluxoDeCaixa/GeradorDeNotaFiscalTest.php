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
    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NotaFiscalDAO");
    $dao->shouldReceive("persiste")->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\Sap");
    $sap->shouldReceive("envia")->andReturn(true);

    $gerador = new GeradorDeNotaFiscal($dao, $sap);
    $pedido = new Pedido("Joaquim", 1000, 1);
    $nf = $gerador->gera($pedido);
    $this->assertEquals(1000 * 0.94, $nf->getValor(), null, 0.00001);
  }

  public function testDevePersistirNFGerada()
  {
    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NotaFiscalDAO");
    $dao->shouldReceive("persiste")->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\Sap");
    $sap->shouldReceive("envia")->andReturn(true);

    $gerador = new GeradorDeNotaFiscal($dao, $sap);
    $pedido = new Pedido("Bruna marquezine", 5000, 1);
    $nf = $gerador->gera($pedido);
    $this->assertTrue($dao->persiste());
    $this->assertNotNull($nf);
  }

  public function testDeveEnviarNFGeradaParaSAP()
  {
    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NotaFiscalDAO");
    $dao->shouldReceive("persiste")->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\Sap");
    $sap->shouldReceive("envia")->andReturn(true);

    $gerador = new GeradorDeNotaFiscal($dao, $sap);
    $pedido = new Pedido("Joana", 2000, 1);
    $nf = $gerador->gera($pedido);

    $this->assertTrue($sap->envia());
    $this->assertEquals(2000 * 0.94, $nf->getValor());    
  }
}    