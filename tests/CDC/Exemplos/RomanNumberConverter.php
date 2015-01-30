<?php

namespace CDC\Exemplos;

class RomanNumberConverter
{

  protected $symbols = [
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'L' => 50,
    'C' => 100,
    'D' => 500,
    'M' => 1000,
  ];

  protected $total = 0;

  public function convert($number)
  {
    for($i = 0; $i < strlen($number); $i++):
      if (array_key_exists($number[$i], $this->symbols)):
        $this->total += $this->symbols[$number[$i]];
      endif;
    endfor;

    return $this->total;
  }
}