<?php
class usuarioDAO {
  public $p = null;
  public $erro = null;
  
  public function __construct() {
    $this->p = new FabricaConexao();
    $this->p->exec("set names utf8");
  }
  
  public function Inserir($usuario) {
    try {
      $stmt = $this->p->prepare("INSERT INTO usuario (nome, cpf, senha) VALUES (?, ?, ?)");
      
      $this->p->beginTransaction();
      $stmt->bindValue(1, $usuario->nome);
      $stmt->bindValue(2, $usuario->cpf);
      $stmt->bindValue(3, $usuario->senha);
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
  
  public function Alterar($usuario) {
    try {
      $stmt = $this->p->prepare("UPDATE usuario SET nome=?, cpf=?, codigo=? WHERE codigo=?");
     
      $this->p->beginTransaction();
      $stmt->bindValue(1, $usuario->nome);
      $stmt->bindValue(2, $usuario->cpf);
      $stmt->bindValue(3, $usuario->codigo);
      $stmt->bindValue(4, $usuario->codigo);
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

  public function Excluir($usuario) {
    try {
      $stmt = $this->p->prepare("DELETE FROM usuario WHERE codigo=?");

      $this->p->beginTransaction();
      $stmt->bindValue(1, $usuario->codigo);
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
          $sql = "SELECT codigo, nome, cpf 
          FROM `usuario`";
          break;
        case 2:
          $sql = "SELECT * FROM usuario WHERE codigo = $param"; 
          break;
      }
              
      $stmt = $this->p->query($sql);
    
      while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        $p = new usuario();
      
        if(isset($registro["codigo"]))
          $p->codigo = $registro["codigo"];
        if(isset($registro["nome"]))
          $p->nome = $registro["nome"];
        if(isset($registro["cpf"]))
          $p->cpf = $registro["cpf"];
        
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

  public function ConsultarLogin($obj, $param=null) {
    try {
      $stmt = $this->p->query("SELECT * FROM usuario WHERE cpf = '$obj->cpf'");
      $registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);

      unset($this->p);

      if(!$registro) {
        return -2;
      }
      else {
        if (strcmp($registro["senha"], $obj->senha) !== 0) {
          return -1;
        }
        else {
          return 1;
        }
      }
    }
    catch(PDOException $e) {
      echo "Erro: ". $e->getMessage();
      return 0;
    }
  }

  // public function ConsultarLoginAdmin($obj, $param=null) {
  //   try {
  //     $stmt = $this->p->query("SELECT admina FROM usuario WHERE cpf = '$obj->cpf'");
  //     $registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT);
  //     unset($this->p);

  //     return $registro;
  //   }
  //   catch(PDOException $e) {
  //     echo "Erro: ". $e->getMessage();
  //     return 0;
  //   }
  // }
}
?>