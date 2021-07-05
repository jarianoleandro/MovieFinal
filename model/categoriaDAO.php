<?php
class categoriaDAO {
  public $p = null;
  public $erro = null;
  
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");
  }
  
  public function Inserir($categoria) {
    try {
      $stmt = $this->p->prepare("INSERT INTO categoria (nome, descricao) VALUES (?, ?)");
      
      $this->p->beginTransaction();
      $stmt->bindValue(1, $categoria->nome);
      $stmt->bindValue(2, $categoria->descricao);
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
  
  public function Alterar($categoria) {
    try {
      $stmt = $this->p->prepare("UPDATE categoria SET nome=?, descricao=?, codigo=? WHERE codigo=?");
     
      $this->p->beginTransaction();
      $stmt->bindValue(1, $categoria->nome);
      $stmt->bindValue(2, $categoria->descricao);
      $stmt->bindValue(3, $categoria->codigo);
      $stmt->bindValue(4, $categoria->codigo);
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

  public function Excluir($categoria) {
    try {
      $stmt = $this->p->prepare("DELETE FROM categoria WHERE codigo=?");

      $this->p->beginTransaction();
      $stmt->bindValue(1, $categoria->codigo);
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
          $sql = "SELECT codigo, nome, descricao 
          FROM `categoria`";
          break;
        case 2:
          $sql = "SELECT * FROM categoria WHERE codigo = $param"; 
          break;
      }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        $p = new categoria();
      
        if(isset($registro["codigo"]))
          $p->codigo = $registro["codigo"];
        if(isset($registro["nome"]))
          $p->nome = $registro["nome"];
        if(isset($registro["descricao"]))
          $p->descricao = $registro["descricao"];
        
        if($op == 1) {
          if(isset($registro["nome"]))
            $p->codpessoa = $registro["nome"];
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