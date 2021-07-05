<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> Alterar</title>
<style>
a {
  text-decoration: none;
}
body {
  padding-left: 15px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<h3>Alteração de dados de um Produto</h3>
<form id="formBuscar" name="formBuscar" method="post" action="alteraProduto.php">
  <label>Informe o código do Produto:
    <input class="form-control" type="number" name="buscaCod" id="buscaCod" required>
  </label>
  <label>
    <input class="btn btn-primary" type="submit" name="buttonbuscar" id="buttonbuscar" value="Buscar">
  </label>
</form>

<?php

  function chamaFormAlterar($codigo, $nome, $descricao, $quantidade, $codfilme) {

?>

<form id="formAlterar" name="formAlterar" method="post" action="alteraProduto.php">
  <p>
    <label>Quantidade:
      <input class="form-control" type="text" name="quantidade" id="quantidade" size="30" value="<?php echo $quantidade;?>" required>
    </label>
  </p>
  <p>
    <label>Descrição:
      <input class="form-control" type="text" name="descricao" id="descricao" size="30" value="<?php echo $descricao;?>" required>
    </label>
  </p>
  <p>
    <label>Filme ID:
      <input class="form-control" type="text" name="codfilme" id="codfilme" size="30" value="<?php echo $codfilme;?>" required>
    </label>
  </p>
  <input type="hidden" name="selCod" id="selCod" value="<?php echo $codigo;?>">
  <p>
    <label>Nome:
     <input class="form-control" class="te" type="text"  name="nome" id="nome" size=""  value="<?php echo $nome;?>" required>
    </label>
  </p>
  
  <p>

    <?php

      include_once("../controller/produtoController.php");
      $obj = new produtoController();

    ?>

    </label>
  </p>  
  <p>
    <label>
      <input type="submit" name="button" id="button" value="Alterar">
    </label>
  </p>
</form>

<?php

  }
  include_once("../controller/produtoController.php");
  $obj = new produtoController();   
  $obj->controlaAlteracao();

?>

  <br>
  <br><br>
  <a href="listaProduto.php">
    <button class="btn btn-primary" class="form-control" type="button">Listar</button>
  </a>
  <a href="insereProduto.php">
    <button class="btn btn-success" type="button">Cadastrar </button>
  </a>
  <a href="excluiProduto.php">
    <button class="btn btn-danger" type="button">Excluir </button>
  </a><br><br>
  <a href="home.php">
    <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
  </a>

</body>
</html>
