<?php
class produtoDAO {
  public $p = null;
  public $erro = null;
  
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");
  }
  
  public function Inserir($produto) {
    try {
      $stmt = $this->p->prepare("INSERT INTO produto (nome, descricao, quantidade, codfilme) VALUES (?, ?, ?, ?)");
       
      $this->p->beginTransaction();
      $stmt->bindValue(1, $produto->nome);
      $stmt->bindValue(2, $produto->descricao);
      $stmt->bindValue(3, $produto->quantidade);
      $stmt->bindValue(4, $produto->codfilme);
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
  
  public function Alterar($produto) {
    try {
      $stmt = $this->p->prepare("UPDATE produto SET nome=?, descricao=?, quantidade=?, codfilme=? WHERE codigo=?");
     
      $this->p->beginTransaction();
      $stmt->bindValue(1, $produto->nome);
      $stmt->bindValue(2, $produto->descricao);
      $stmt->bindValue(3, $produto->quantidade);
      $stmt->bindValue(4, $produto->codfilme);
      $stmt->bindValue(5, $produto->codigo);
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
      $stmt = $this->p->prepare("DELETE FROM produto WHERE codigo=?");

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
          $sql = "SELECT produto.codigo, produto.nome, produto.descricao, produto.quantidade, filmes.titulo  
          FROM `produto`, `filmes` WHERE produto.codfilme = filmes.codfilme";
          break;
        case 2:
          $sql = "SELECT * FROM produto WHERE codigo = $param"; 
          break;
        case 3:
          $sql = "SELECT * FROM produto WHERE codfilme = $param"; 
          break;
        }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        $p = new produto();
      
        if(isset($registro["codigo"]))
          $p->codigo = $registro["codigo"];
        if(isset($registro["nome"]))
          $p->nome = $registro["nome"];
        if(isset($registro["descricao"]))
          $p->descricao = $registro["descricao"];
        if(isset($registro["quantidade"]))
          $p->quantidade = $registro["quantidade"];
        
        if($op == 1) {
          if(isset($registro["nome"]))
            $p->codfilme = $registro["nome"];
        } else {
          if(isset($registro["codfilme"]))
            $p->codfilme = $registro["codfilme"];
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