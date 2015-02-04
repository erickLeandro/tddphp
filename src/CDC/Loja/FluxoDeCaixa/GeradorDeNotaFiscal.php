<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\FluxoDeCaixa\NotaFiscal;
use CDC\Loja\Tributos\ITributos;
use CDC\Exemplos\IRelogio;

class GeradorDeNotaFiscal
{
  private $acoes;
  private $relogio;
  private $tabela;

  public function __construct($acoes, IRelogio $relogio, ITributos $tabela)
  {
    $this->acoes = $acoes;
    $this->relogio = $relogio;
    $this->tabela = $tabela;
  }

  public function gera(Pedido $pedido)
  {

    $valorTabela = $this->tabela->paraValor($pedido->getValorTotal());
    $valorTotal = $pedido->getValorTotal() * $valorTabela;

    $nf = new NotaFiscal(
      $pedido->getCliente(),
      $valorTotal,
      $this->relogio->hoje()
    );

    foreach ($this->acoes as $acao):
      $acao->executa($nf);
    endforeach;

    return $nf;
  }
}