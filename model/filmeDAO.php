<?php

class filmeDAO {
  public $p = null;
  public $erro = null;
  
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");
  }
  
  public function Inserir($filme) {
    try { 
      $stmt = $this->p->prepare("INSERT INTO filmes (titulo, descricao, data_lancamento, categoria) VALUES  (?, ?, ?, ?)");
      
      $this->p->beginTransaction();
      $stmt->bindValue(1, $filme->titulo);
      $stmt->bindValue(2, $filme->descricao);
      $stmt->bindValue(3, $filme->data_lancamento);
      $stmt->bindValue(4, $filme->categoria);
      $stmt->execute();

      $this->p->commit();      
      unset($this->p);
  
      return true;
    }  catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
      return false;
    }
  }
  
  public function Alterar($filme) {
    try {
      $stmt = $this->p->prepare("UPDATE filmes SET titulo=?, descricao=?, data_lancamento=?, categoria=? WHERE codfilme=?");
     
      $this->p->beginTransaction();
      $stmt->bindValue(1, $filme->titulo);
      $stmt->bindValue(2, $filme->descricao);
      $stmt->bindValue(3, $filme->data_lancamento);
      $stmt->bindValue(4, $filme->categoria);
      $stmt->bindValue(5, $filme->cod);
  
      $stmt->execute();
  
      $this->p->commit();
      unset($this->p);

      return true;
    }
    catch(PDOException $e) {
      $this->erro = "Erro: " . $e->getMessage();
      return false;
    }
  }

  public function Excluir($filme) {
    try {
        $stmt = $this->p->prepare("DELETE FROM filmes WHERE codfilme=?");
        $this->p->beginTransaction();
        $stmt->bindValue(1, $filme->codigo);
        $stmt->execute();
        
        $this->p->commit();
        unset($this->p);
  
        return true;
      }
      catch(PDOException $e) {
        $this->erro = "Erro: " . $e->getMessage();
        return false;
      }
  }

  public function Consultar($op, $param=null) {
    try {
      $items = array();

      switch($op) {
        case 1:
          $sql = "SELECT codfilme, titulo, descricao, data_lancamento, categoria 
          FROM `filmes`";
          break;
        case 2:
          $sql = "SELECT * FROM filmes WHERE codfilme = $param"; 
          break;
      }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        $p = new filme();
      
        if(isset($registro["codfilme"]))
          $p->codfilme = $registro["codfilme"];
        if(isset($registro["titulo"]))
          $p->titulo = $registro["titulo"];
        if(isset($registro["descricao"]))
          $p->descricao = $registro["descricao"];
        if(isset($registro["data_lancamento"]))
          $p->data_lancamento = $registro["data_lancamento"];
        if(isset($registro["categoria"]))
          $p->categoria = $registro["categoria"];
        
        if($op == 1) {
           if(isset($registro["titulo"]))
            $p->titulo = $registro["titulo"];
        }
        $items[] = $p;
      }

      unset($this->p);
    
      return $items;
    }
    catch(PDOException $e) {
      echo "Erro: ". $e->getMessage();
    }
  }
}
?>
