<?php

class usuario {
  private $codigo;
  private $nome; 
  private $cpf;
  private $senha; 

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>