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

<h3>Cadastro de uma nova categoria</h3>
<form id="formInserirCategoria" name="formInserirCategoria" method="post" action="insereCategoria.php">
  <p>
    <label>Nome da Categoria:
      <input class="form-control" type="text"  name="descricao" id="descricao" size="30" required>
    </label>
  </p>
  <p>
    <label>Descrição da Categoria:</label>
  </p>
  <textarea  rows="10" cols="40" maxlength="500" name="nome" id="nome"></textarea>
  <p>

      <?php

        include_once("../controller/categoriaController.php");
        $obj = new categoriaController();

      ?>

    </label>
  </p>  
  <p>
    <label>
      <input class="btn btn-success" type="submit" name="button" id="button" value="Inserir">
    </label>
  </p>
</form>

<br><br>
<a href="listacategoria.php">
  <button class="btn btn-primary" type="button">Listar</button>
</a>
<a href="alteracategoria.php">
  <button class="btn btn-warning" type="button">Alterar</button>
</a>
<a href="excluicategoria.php">
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