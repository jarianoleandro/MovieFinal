<?php
require_once("../model/FabricaConexao.php");
require_once("../model/produto.php");
require_once("../model/produtoDAO.php");


class produtoController {

  private function buscaDados($codigo, $opp) {
    $DAO = new produtoDAO();
    $cat = $DAO->Consultar(2, $codigo);
  
    if(count($cat) == 1) {
      $nome = $cat[0]->nome;
      $descricao  = $cat[0]->descricao;
      $quantidade  = $cat[0]->quantidade;
      $codfilme  = $cat[0]->codfilme;

      if($opp == 0)
        chamaFormAlterar($codigo, $nome, $descricao, $quantidade, $codfilme);
      else
        chamaFormExcluir($codigo, $nome, $descricao, $quantidade, $codfilme);
  
      print "<script>";
      print "document.formBuscar.buscaCod.value = '$codigo';";
      print "document.formBuscar.buscaCod.disabled = true;";
      print "document.formBuscar.buttonbuscar.disabled  = true;";
      print "</script>";
    } else{
      print "<script>";
      print "alert('Categoria NÃO ENCONTRADA! Por favor, tente novamente...');";
      print "</script>";          
    }
    unset($cat);
  }  
  
  public function controlaInsercao() {
    if(isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["quantidade"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $descricao = $_POST["descricao"];
      $quantidade = $_POST["quantidade"];
      $codfilme = $_POST["codfilme"];

      if(count($erros) == 0) {
        $DAO = new produtoDAO();
        $cat = new produto();
        $cat->nome = $nome;
        $cat->descricao = $descricao;
        $cat->quantidade = $quantidade;
        $cat->codfilme = $codfilme;

        if($DAO->Inserir($cat)) {
          print "<script>";
          print "alert('Cadastrado com sucesso...');";
          print "</script>"; 
        } else{
          print "<script>";
          print "alert('Erro no cadastro...');";
          print "</script>"; 
        }
        unset($cat);
      }
    }
  }
  
  public function controlaConsulta($op) {
    $DAO = new produtoDAO();
    $lista = array();
    $numCol = 3;
    
    switch($op) {
      case 1:
        $lista = $DAO->Consultar(1);
        break;
      case 3:
        $codfilmeProd = $_GET["id"];
        $lista = $DAO->Consultar(3, $codfilmeProd);
        break;  
    }
    
    if(count($lista) > 0) {
      for($i = 0; $i < count($lista); $i++) {
        $codigo = $lista[$i]->codigo;
        $nome = $lista[$i]->nome;
        $descricao  = $lista[$i]->descricao;
        $quantidade  = $lista[$i]->quantidade;
        $codfilme  = $lista[$i]->codfilme;
      
        echo "<tr>";
          
        if($codigo)
          echo "<td style=\"text-align: center;\">$codigo</td>";
        if($descricao)
          echo "<td style=\"text-align: left;\">$descricao</td>";
        if($nome)
          echo "<td style=\"text-align: left;\">$nome</td>";
        if($nome)
          echo "<td style=\"text-align: left;\">$quantidade</td>";
        if($nome)
          echo "<td style=\"text-align: left;\">$codfilme</td>";
        echo "</tr>";
      }
    } else{
      echo "<tr>";
      echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
      echo "</tr>";
    }
  }

  public function controlaAlteracao() {
    if(isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["quantidade"]) && isset($_POST["selCod"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $descricao = $_POST["descricao"];
      $codfilme = $_POST["codfilme"];
      $quantidade = $_POST["quantidade"];
      $codigo = $_POST["selCod"];      
      
      if(count($erros) == 0) {
        $DAO = new produtoDAO();
        $cat = new produto();
        $cat->nome = $nome;
        $cat->descricao = $descricao;
        $cat->quantidade = $quantidade;
        $cat->codfilme = $codfilme;
        $cat->codigo = $codigo;

        if($DAO->Alterar($cat)) {
          print "<script>";
          print "alert('Alterado com sucesso...');";
          print "</script>"; 
        } else{
          print "<script>";
          print "alert('Erro durante a alteração...');";
          print "</script>";   
        }
        unset($cat);
      }
    } else if(isset($_POST["buscaCod"])) {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 0); 
    }
  }
  
  public function controlaExclusao() {
    if(isset($_POST["selCod"])) {
      $DAO = new produtoDAO();
      $cat = new produto();

      $codigo = $_POST["selCod"];
      $cat->codigo = $codigo;
      
      if($DAO->Excluir($cat)) {
          print "<script>";
          print "alert('Excluido com sucesso...');";
          print "</script>"; 
      } else{
        print "<script>";
         print "alert('Erro no Processo de exclusao...');";
        print "</script>";          
      }
      unset($cat);
    } else if(isset($_POST["buscaCod"])) {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 1); 
    }
  }
}

?>