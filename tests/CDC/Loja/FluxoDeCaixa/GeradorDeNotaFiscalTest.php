<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use CDC\Exemplos\RelogioDoSistema;
use \Mockery;

class GeradorDeNotaFiscalTest extends TestCase
{
  public function setUp()
  {
    parent::setUp();
  }

  public function testDeveGerarNFComImpostoDescontado()
  {
    //mockando uma tabela que ainda nem existe
    $tabela = Mockery::mock("CDC\Loja\Tributos\ITributos");

    $tabela->shouldReceive("paraValor")
           ->with(1000.0)
           ->andReturn(0.2);

    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $dao->shouldReceive("executa")
        ->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $sap->shouldReceive("executa")
        ->andReturn(true);

    $gerador = new GeradorDeNotaFiscal(array($dao, $sap), new RelogioDoSistema(), $tabela);
    $pedido = new Pedido("Joaquim", 1000, 1);
    $nf = $gerador->gera($pedido);
    $this->assertTrue($dao->executa($nf));
    $this->assertTrue($sap->executa($nf));
    $this->assertEquals(1000 * 0.2, $nf->getValor(), null, 0.00001);
  }

  public function testDeveExecutarAcoesPosteriores()
  {

    //mockando uma tabela que ainda nem existe
    $tabela = Mockery::mock("CDC\Loja\Tributos\ITributos");

    $tabela->shouldReceive("paraValor")
           ->with(1000.0)
           ->andReturn(0.2);

    $dao = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $dao->shouldReceive("executa")
        ->andReturn(true);

    $sap = Mockery::mock("CDC\Loja\FluxoDeCaixa\NFInterface");
    $sap->shouldReceive("executa")
        ->andReturn(true);

    $gerador = new GeradorDeNotaFiscal(array($dao, $sap), new RelogioDoSistema(), $tabela);
    $pedido = new Pedido("Bruna marquezine", 1000, 1);
    $nf = $gerador->gera($pedido);
    $this->assertTrue($dao->executa($nf));
    $this->assertTrue($sap->executa($nf));
    $this->assertNotNull($nf);
  }

  public function testeDeveConsultarTabelaParaCalcularValor()
  {
    //mockando uma tabela que ainda nem existe
    $tabela = Mockery::mock("CDC\Loja\Tributos\ITributos");

    $tabela->shouldReceive("paraValor")
           ->with(1000.0)
           ->andReturn(0.2);

    $gerador = new GeradorDeNotaFiscal(array(), new RelogioDoSistema(), $tabela);           

    $pedido = new Pedido("Bruna marquezine", 1000, 1);

    $nf = $gerador->gera($pedido);

    //Garantindo que a tabela foi consultada
    $this->assertEquals(1000 * 0.2, $nf->getValor(), null, 0.00001);
  }

}    