<?php

class categoria {
  private $codigo;
  private $nome; 
  private $descricao; 

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>