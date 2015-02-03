<?php

namespace CDC\Loja\FluxoDeCaixa;

use CDC\Loja\FluxoDeCaixa\NotaFiscal;

interface NFInterface
{
  public function executa(NotaFiscal $nf);
}