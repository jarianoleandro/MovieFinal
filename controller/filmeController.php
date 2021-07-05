<?php
require_once("../model/FabricaConexao.php");
require_once("../model/filme.php");
require_once("../model/filmeDAO.php");


class filmeController {

  private function buscaDados($codigo, $opp) {
    $DAO = new filmeDAO();
    $fil = $DAO->Consultar(2, $codigo);
  
    if(count($fil) == 1) {
      $titulo = $fil[0]->titulo;
      $descricao  = $fil[0]->descricao;
      $data_lancamento  = $fil[0]->data_lancamento;
      $categoria  = $fil[0]->categoria;
   
      if($opp == 0)
        chamaFormAlterar($codigo, $titulo, $descricao, $data_lancamento, $categoria);
      else
        chamaFormExcluir($codigo, $titulo, $descricao, $data_lancamento, $categoria);
  
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

    if(isset($_POST["titulo"]) && isset($_POST["descricao"])) {
      $erros = array();
      $titulo = $_POST['titulo'];
      $descricao = $_POST['descricao'];
      $data_lancamento = $_POST['data_lancamento'];
      $categoria = $_POST['categoria'];

      if(count($erros) == 0) {
        $DAO = new filmeDAO();
        $fil = new filme();
        $fil->titulo = $titulo;
        $fil->descricao = $descricao;
        $fil->data_lancamento = $data_lancamento;
        $fil->categoria = $categoria;

        if($DAO->Inserir($fil)) {
          print "<script>";
          print "alert('Cadastrado com sucesso...');";
          print "</script>"; 
        } else{
          print "<script>";
          print "alert('Erro no cadastro...');";
          print "</script>"; 
        }
        unset($fil);
      }
    }
  }
  
  public function controlaConsulta($op) {
    $DAO = new filmeDAO();
    $lista = array();
    $numCol = 3;
    
    switch($op) {
      case 1:
        $lista = $DAO->Consultar(1);
        break;
    }
    
    if(count($lista) > 0) {
      for($i = 0; $i < count($lista); $i++) {
        $codigo = $lista[$i]->codfilme;
        $titulo = $lista[$i]->titulo;
        $descricao = $lista[$i]->descricao;
        $data_lancamento = $lista[$i]->data_lancamento;
        $categoria = $lista[$i]->categoria;
      
        echo "<tr>";
          
        // if($codigo)
        //   echo "<td style=\"text-align: center;\">$codigo</td>";
        if($descricao)
          echo "<td style=\"text-align: left;\">$descricao</td>";
        if($titulo)
          echo "<td style=\"text-align: left;\">$titulo</td>";
        if($data_lancamento)
          echo "<td style=\"text-align: left;\">$data_lancamento</td>";
        if($categoria)
          echo "<td style=\"text-align: left;\">$categoria</td>";
        if($codigo)
          echo "<td><a href='mostraProduto.php?id=$codigo'>Produtos</a></td>";
          echo "</tr>";
        }
    } else{
      echo "<tr>";
      echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
      echo "</tr>";
    }
  }

  public function controlaAlteracao() {
    if(isset($_POST["titulo"]) && isset($_POST["descricao"])) {
      $erros = array();
      $cod = $_POST["selCod"];  
      $titulo = $_POST['titulo'];
      $descricao = $_POST['descricao'];
      $data_lancamento = $_POST['data_lancamento'];
      $categoria = $_POST['categoria'];   
      
      if(count($erros) == 0) {
        $DAO = new filmeDAO();
        $fil = new filme();
        $fil->cod = $cod;
        $fil->titulo = $titulo;
        $fil->descricao = $descricao;
        $fil->data_lancamento = $data_lancamento;
        $fil->categoria = $categoria;
        
        if($DAO->Alterar($fil)) {
          print "<script>";
          print "alert('Alterado com sucesso...');";
          print "</script>"; 
        } else{
          print "<script>";
          print "alert('Erro durante a alteração...');";
          print "</script>";   
        }
        unset($fil);
      }
    } else if(isset($_POST["buscaCod"])) {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 0); 
    }
  }
  
  public function controlaExclusao() {
    if(isset($_POST["selCod"])) {
      $DAO = new filmeDAO();
      $cat = new filme();

      $codigo = $_POST["selCod"];
      $cat->codigo = $codigo;
      
      if($DAO->Excluir($cat)) {
          print "<script>";
          print "alert('Excluido com sucesso...');";
          print "</script>"; 
      } else {
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