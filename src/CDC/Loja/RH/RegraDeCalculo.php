<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

abstract class RegraDeCalculo
{
  public function calcula(Funcionario $funcionario)
  {
    if ($funcionario->getSalario() > $this->limite()):
      return $funcionario->getSalario() * $this->porcentagemAcimaDoLimite();
    endif;

    return $funcionario->getSalario() * $this->porcentagemBase();
  }  

  protected function limite() {}

  protected function porcentagemAcimaDoLimite() {}

  protected function porcentagemBase() {}
}