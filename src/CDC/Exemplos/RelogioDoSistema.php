<?php

namespace CDC\Exemplos;

use CDC\Exemplos\IRelogio;
use DateTime;

class RelogioDoSistema implements IRelogio
{
  public function hoje()
  {
    return DateTime::createFromFormat('Y-m-d', date('Y-m-d'));    
  }  
}