<?php

namespace CDC\Loja\FluxoDeCaixa;

use \DateTime;
use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\FluxoDeCaixa\NotaFiscal;
use CDC\Loja\FluxoDeCaixa\NotaFiscalDAO;
use CDC\Loja\FluxoDeCaixa\Sap;

class GeradorDeNotaFiscal
{
  private $dao;
  private $sap;

  public function __construct(NotaFiscalDAO $dao, Sap $sap)
  {
    $this->dao = $dao;
    $this->sap = $sap;
  }

  public function gera(Pedido $pedido)
  {
    $nf = new NotaFiscal(
      $pedido->getCliente(),
      $pedido->getValorTotal() * 0.94,
      new DateTime()
    );

    if ($this->dao->persiste($nf) && $this->sap->envia($nf)):
      return $nf;
    endif;

    return null;
  }
}