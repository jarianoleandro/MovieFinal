<?php

class filme {
  private $codfilme;
  private $titulo; 
  private $descricao; 
  private $data_lancamento; 
  private $categoria; 

  public function __set($propriedade, $valor) {
    $this->$propriedade = $valor;
  }

  public function __get($propriedade) {
    return $this->$propriedade;
  }
}

?>