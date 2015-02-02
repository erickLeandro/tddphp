<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

interface iRegraDeCalculo
{
  public function calcula(Funcionario $funcionario);  
}