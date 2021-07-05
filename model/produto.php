<?php

class produto {
  private $codigo;
  private $nome; 
  private $descricao; 
  private $quantidade; 
  private $codfilme; 

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>