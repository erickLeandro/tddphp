<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\iRegraDeCalculo;
use CDC\Loja\RH\Funcionario;

class DezOuVintePorCento implements iRegraDeCalculo
{
  public function calcula(Funcionario $funcionario)
  {
    if ($funcionario->getSalario() > 3000):
      return $funcionario->getSalario() * 0.8;
    endif;
  }

  return $funcionario->getSalario() * 0.9;
}