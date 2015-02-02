<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\iRegraDeCalculo;
use CDC\Loja\RH\Funcionario;

class QuinzeOuVintePorCento implements iRegraDeCalculo
{
  public function calcula(Funcionario $funcionario)
  {
    if ($funcionario->getSalario() < 2500):
      return $funcionario->getSalario() * 0.85;
    endif;
  }

  return $funcionario->getSalario() * 0.75;
}