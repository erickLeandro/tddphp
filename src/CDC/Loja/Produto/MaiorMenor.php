<?php

namespace CDC\Loja\Produto;

use CDC\Loja\Carrinho\CarrinhoDeCompras;

class MaiorMenor
{
  private $maior;
  private $menor;  

  public function encontra(CarrinhoDeCompras $carrinho)
  {
    foreach($carrinho->getProdutos() as $produto):

      if(empty($this->menor) || $produto->getValor() < $this->menor->getValor()):
        $this->menor = $produto;
      endif;
     
      if(empty($this->maior) || $produto->getValor() > $this->maior->getValor()):
        $this->maior = $produto;
      endif;

    endforeach;
  }

  public function getMaior()
  {
    return $this->maior;
  }

  public function getMenor()
  {
    return $this->menor;
  }

}