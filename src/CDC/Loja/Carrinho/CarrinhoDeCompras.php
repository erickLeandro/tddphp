<?php

namespace CDC\Loja\Carrinho;

use \ArrayObject;

use CDC\Loja\Produto\Produto;

class CarrinhoDeCompras
{
  private $produtos;
  private $maior = 0;
  
  public function __construct()
  {
    $this->produtos = new ArrayObject();
  }

  public function adiciona(Produto $produto)
  {
    $this->produtos->append($produto);
    return $this;
  }

  public function getProdutos()
  {
    return $this->produtos;
  }

  public function encontra()
  {
    if (count($this->getProdutos()) === 0):
      return 0;
    endif;

    foreach ($this->getProdutos() as $produto):
      if ($this->maior < $produto->getValorTotal()):
        $this->maior = $produto->getValorTotal();
      endif;
    endforeach;

    return $this->maior;
  }  

}