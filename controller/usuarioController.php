<?php
require_once("../model/FabricaConexao.php");
require_once("../model/usuario.php");
require_once("../model/usuarioDAO.php");


class usuarioController {

  private function buscaDados($codigo, $opp) {
    $DAO = new usuarioDAO();
    $usu = $DAO->Consultar(2, $codigo);
  
    if(count($usu) == 1) {
      $nome = $usu[0]->nome;
      $cpf  = $usu[0]->cpf;
   
      if($opp == 0)
        chamaFormAlterar($codigo, $nome, $cpf);
      else
        chamaFormExcluir($codigo, $nome, $cpf);
  
      print "<script>";
      print "document.formBuscar.buscaCod.value = '$codigo';";
      print "document.formBuscar.buscaCod.disabled = true;";
      print "document.formBuscar.buttonbuscar.disabled  = true;";
      print "</script>";
    } else{
      print "<script>";
      print "alert('Usuario NÃO ENCONTRADO! Por favor, tente novamente...');";
      print "</script>";          
    }
    unset($usu);
  }  
  
  public function controlaInsercao() {
    if(isset($_POST["nome"]) && isset($_POST["cpf"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];
      $senha = md5($_POST["senha"]);
  
      if(count($erros) == 0) {
        $DAO = new usuarioDAO();
        $usu = new usuario();
        $usu->nome = $nome;
        $usu->cpf = $cpf;
        $usu->senha = $senha;

        if($DAO->Inserir($usu)) {
          print "<script>";
          print "alert('Cadastrado com sucesso...');";
          print "</script>"; 
        } else{
          print "<script>";
          print "alert('Erro no cadastro...');";
          print "</script>"; 
        }
        unset($usu);
      }
    }
  }
  
  public function controlaConsultaLogin() {
    if (!empty($_POST['cpf']) && !empty($_POST['pwd'])) {
      $user = new usuario();
      $user->cpf = $_POST['cpf'];
      $user->senha = md5($_POST['pwd']);
  
      $DAO = new UsuarioDAO();
      $result = $DAO->ConsultarLogin($user);
      // $dado = $DAO->ConsultarLoginAdmin($user);
  
       if($result) { 
         if($result == -2) {
           echo "<p>USUÁRIO NÃO ENCONTRADO!</p>";
           echo "<a href=\"../view/index.php\"><button>Voltar</button></a>";  
         } else if($result == -1) {
           echo "<p>SENHA INVÁLIDA!</p>";
           echo "<a href=\"../view/index.php\"><button>Voltar</button></a>";  
         } else{ 
          //  if ($dado->admina) {
          //    session_start();
          //    $_SESSION["nome_usuario"] = $user->cpf;
          //    $_SESSION["senha_usuario"] = $user->senha;
          //    header("location: ../view/listafilmeProduto.php");  
          //  } else {
            session_start();
            $_SESSION["nome_usuario"] = $user->cpf;
            $_SESSION["senha_usuario"] = $user->senha;
            header("location: ../view/home.php");  
          //  }
        }
      }
    }
  }

  public function controlaConsulta($op) {
    $DAO = new usuarioDAO();
    $lista = array();
    $numCol = 3;
    
    switch($op) {
      case 1:
        $lista = $DAO->Consultar(1);
        break;
    }
    
    if(count($lista) > 0) {
      for($i = 0; $i < count($lista); $i++) {
        $codigo = $lista[$i]->codigo;
        $nome = $lista[$i]->nome;
        $cpf  = $lista[$i]->cpf;
      
        echo "<tr>";
          
        if($codigo)
          echo "<td style=\"text-align: center;\">$codigo</td>";
        if($cpf)
          echo "<td style=\"text-align: left;\">$cpf</td>";
          if($nome)
          echo "<td style=\"text-align: left;\">$nome</td>";
        echo "</tr>";
      }
    } else{
      echo "<tr>";
      echo "<td colspan=\"$numCol\">Nenhum registro encontrado!</td>";
      echo "</tr>";
    }
  }

  public function controlaAlteracao() {
    if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["selCod"])) {
      $erros = array();
      $nome = $_POST["nome"];
      $cpf = $_POST["cpf"];
      $codigo = $_POST["selCod"];      
      
      if(count($erros) == 0) {
        $DAO = new usuarioDAO();
        $usu = new usuario();
        $usu->nome = $nome;
        $usu->cpf = $cpf;
        $usu->codigo = $codigo;

        if($DAO->Alterar($usu)) {
          print "<script>";
          print "alert('Alterado com sucesso...');";
          print "</script>"; 
        } else{
          print "<script>";
          print "alert('Erro durante a alteração...');";
          print "</script>";   
        }
        unset($usu);
      }
    } else if(isset($_POST["buscaCod"])) {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 0); 
    }
  }
  
  public function controlaExclusao() {
    if(isset($_POST["selCod"])) {
      $DAO = new usuarioDAO();
      $usu = new usuario();

      $codigo = $_POST["selCod"];
      $usu->codigo = $codigo;
      
      if($DAO->Excluir($usu)) {
          print "<script>";
          print "alert('Excluido com sucesso...');";
          print "</script>"; 
      } else{
        print "<script>";
         print "alert('Erro no Processo de exclusao...');";
        print "</script>";          
      }
      unset($usu);
    } else if(isset($_POST["buscaCod"])) {
      $codigo = $_POST["buscaCod"];
      $this->buscaDados($codigo, 1); 
    }
  }
}

?>