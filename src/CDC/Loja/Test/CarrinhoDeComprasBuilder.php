<?php

namespace CDC\Loja\Test;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
  private $carrinho;

  public function __construct()
  {
    $this->carrinho = new CarrinhoDeCompras;
  }

  public function withItems()
  {
    $valores = func_get_args();
    foreach ($valores as $valor):
      $this->carrinho->adiciona(new Produto("Item", $valor, 1));
    endforeach;
    return $this;
  }

  public function create()
  {
    return $this->carrinho;
  }
}