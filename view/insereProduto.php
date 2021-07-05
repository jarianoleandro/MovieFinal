<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> Inserir</title>
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

<h3>Cadastro de um novo produto</h3>
<form id="formInserirProduto" name="formInserirProduto" method="post" action="insereProduto.php">
  <p>
    <label>Nome do produto:
      <input class="form-control" type="text"  name="nome" id="nome" size="30" required>
    </label>
  </p>
  <p>
    <label>Quantidade do produto:
      <input class="form-control" type="text"  name="quantidade" id="quantidade" size="30" required>
    </label>
  </p>
  <p>
    <label>Filme Associado:
      <input class="form-control" type="text"  name="codfilme" id="codfilme" size="30" required>
    </label>
  </p>
  <p>
    <label>Descrição do produto:</label>
  </p>
  <textarea rows="10" cols="40" maxlength="500" name="descricao" id="descricao"></textarea>
  <p>

      <?php

        include_once("../controller/produtoController.php");
        $obj = new produtoController();

      ?>

    </label>
  </p>  
  <p>
    <label>
      <input class="btn btn-primary"  type="submit" name="button" id="button" value="Inserir">
    </label>
  </p>
</form>

<br><br>
<a href="listaProduto.php">
  <button class="btn btn-primary" type="button">Listar</button>
</a>
<a href="alteraProduto.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<a href="excluiProduto.php">
  <button class="btn btn-danger" type="button">Excluir </button>
</a><br><br>
<br>
<a href="home.php">
  <button class="btn btn-secondary" type="button">Retornar para a página principal</button>
</a>

<?php

  $obj->controlaInsercao();

?>

</body>
</html>