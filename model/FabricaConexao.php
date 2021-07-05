<?php

class FabricaConexao extends PDO {
  private $dbn = "mysql:host=localhost;port=3306;dbname=bancoteste";
  private $usr = "root";
  private $pwd = "";
  public $handle = null;

  function __construct() {
    try {
      if($this->handle == null) {
        $dbh = parent::__construct($this->dbn, $this->usr ,$this->pwd);
        $this->handle = $dbh;
        return $this->handle;
      }
    }
    catch(PDOException $e) {
      echo "Conexão falhou. Erro: " . $e->getMessage() . "\n";
      return false;
    }
  }

  function __destruct() {
    $this->handle = NULL;
  }
}

?>
