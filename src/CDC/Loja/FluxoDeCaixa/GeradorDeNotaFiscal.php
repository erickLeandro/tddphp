<?php

namespace CDC\Loja\FluxoDeCaixa;

use \DateTime;
use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\FluxoDeCaixa\NotaFiscal;
use CDC\Loja\FluxoDeCaixa\NotaFiscalDAO;
use CDC\Loja\FluxoDeCaixa\Sap;

class GeradorDeNotaFiscal
{
  private $acoes;

  public function __construct($acoes)
  {
    $this->acoes = $acoes;
  }

  public function gera(Pedido $pedido)
  {
    $nf = new NotaFiscal(
      $pedido->getCliente(),
      $pedido->getValorTotal() * 0.94,
      new DateTime()
    );

    foreach ($this->acoes as $acao):
      $acao->executa($nf);
    endforeach;

    return $nf;
  }
}